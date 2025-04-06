# Gestion de Tâches - Tests Automatisés

Ce projet est une application de gestion de tâches avec des tests automatisés utilisant **PHPUnit, Selenium, Cypress et JMeter/k6**. Il permet d'ajouter, modifier et supprimer des utilisateurs tout en assurant la qualité du code grâce aux tests unitaires, end-to-end et de performance.

-----

## Fonctionnalités

- Ajouter un utilisateur
- Modifier un utilisateur
- Supprimer un utilisateur
- Exécuter des tests unitaires avec **PHPUnit**  
- Tester l'interface utilisateur avec **Selenium & Cypress**  
- Simuler des charges utilisateur avec **JMeter/k6**  

-----

## Technologies utilisées

- **PHP 8.4.4** - Langage backend  
- **PHPUnit** - Tests unitaires  
- **Selenium IDE** - Tests end-to-end  
- **Cypress** - Automatisation des scénarios utilisateur  
- **JMeter / k6** - Tests de performance  

-----

## Installation

### 1. Cloner le projet
```sh
https://github.com/yumeei/TU-gestion-utilisateurs.git
cd TU-gestion-utilisateurs

```

### 2. Installer les dépendances PHP
```sh
composer install
```

### 3. Configurer Selenium

### 4. Installer JMeter
JMeter : https://jmeter.apache.org/download_jmeter.cgi

## Éxécution des tests

### Tests unitaires avec PHPUnit
```sh
php ./vendor/bin/phpunit tests
OU
vendor/bin/phpunit --testdox tests
```

## Rapport de validation
 Lien vers le rapport de validation: https://docs.google.com/document/d/1NvlN6t9wml6tOceiMUmuFjehdGcScJESuM47Pdtv6v8/edit?usp=sharing
