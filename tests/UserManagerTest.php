<?php

namespace Yumei\GestionProduit;

use PHPUnit\Framework\TestCase;
use Yumei\GestionProduit\UserManager;

use Exception;

class UserManagerTest extends TestCase {
  
  protected function setUp(): void {
    $this->db = new \PDO("mysql:host=localhost;dbname=user_management;charset=utf8", "root", "rootroot", [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);

    $this->db->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            date_added DATETIME DEFAULT NULL
        );
    ");

    $this->db->exec("DELETE FROM users");
    $user = new UserManager();
  }

  public function testConstructeur()
  {
    $this->db->exec("DELETE FROM users");
    $userManager = new UserManager();
    $this->assertCount(0, $userManager->getUsers());
  }

  public function testAddUser()
  {
      $userManager = new UserManager();
      $userManager->addUser('Test User', 'test@test.com');
      $this->assertCount(1, $userManager->getUsers());
      $this->assertEquals('Test User', $userManager->getUsers()[0]['name']);
      $this->assertEquals('test@test.com', $userManager->getUsers()[0]['email']);
  }

  public function testAddUserEmailException()
  {
      $userManager = new UserManager();
      $this->expectException(\InvalidArgumentException::class); 
      $userManager->addUser('Test User', 'invalid-email');
  }

  public function testUpdateUser()
  {
      $userManager = new UserManager();
      $userManager->addUser('Test User', 'test@test.com');
      $user = $userManager->getUsers()[0];
      $userManager->updateUser($user['id'], 'Updated User', 'updated@updated.com');
      $updatedUser = $userManager->getUser($user['id']);
      
      $this->assertEquals('Updated User', $updatedUser['name']);
      $this->assertEquals('updated@updated.com', $updatedUser['email']);
  }

  public function testRemoveUser()
  {
      $userManager = new UserManager();
      $userManager->addUser('Test User', 'test@test.com');
      $user = $userManager->getUsers()[0];
      $userManager->removeUser($user['id']);
      $this->assertCount(0, $userManager->getUsers());
  }

  public function testGetUsers()
  {
      $userManager = new UserManager();
      $userManager->addUser('User 1', 'user1@test.com');
      $userManager->addUser('User 2', 'user2@test.com');
      
      $users = $userManager->getUsers();
      $this->assertCount(2, $users);
      $this->assertEquals('User 1', $users[0]['name']);
      $this->assertEquals('User 2', $users[1]['name']);
  }

  public function testInvalidUpdateThrowsException()
  {
    $userManager = new UserManager();
    $this->expectException(\Exception::class);
    $userManager->getUser(9999);
    $userManager->updateUser(9999, 'Nom inexistant', 'inexistant@inexistant.com');
  }

  public function testInvalidDeleteThrowsException()
  {
      $userManager = new UserManager();
      $this->expectException(Exception::class);
      $userManager->getUser(9999);
      $userManager->removeUser(9999);
  }
}