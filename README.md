
> ### WARNING:
> **This repository is in development. If you need a library to work with the Ionic PUsh API, use this: https://github.com/tomloprod/ionic-push-php**


# ionic-cloud-php [![Release](https://img.shields.io/github/release/tomloprod/ionic-cloud-php.svg)](https://github.com/tomloprod/ionic-cloud-php) [![Join the chat at https://gitter.im/tomloprod/ionic-cloud-php](https://badges.gitter.im/tomloprod/ionic-cloud-php.svg)](https://gitter.im/tomloprod/ionic-cloud-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge) [![License](https://img.shields.io/github/license/tomloprod/ionic-cloud-php.svg)](http://www.opensource.org/licenses/mit-license.php)

ionic-push-php is a library that allows you to consume the *Ionic Cloud API* for **sending push notifications** (*normal and scheduled*), get a paginated **list of sending push notifications**,  get **information of registered devices**, **remove registered devices by token**, ...

Ionic official documentation: [Ionic HTTP API - Push](https://docs.ionic.io/api/endpoints/push.html).

## Requirements:

- PHP 5.1+
- cURL

## Installation:

    composer require tomloprod/ionic-push-php

## Configuration:

First, make sure you have your `$ionicAPIToken` and your `$ionicProfile`:

- (string) **$ionicAPIToken:** The API token that you must create in *Settings › API Keys* in the [Dashboard](https://apps.ionic.io).
- (string) **$ionicProfile:** The Security Profile tag found in *Settings › Certificates* in the [Dashboard](https://apps.ionic.io)

> More information [here](https://github.com/tomloprod/ionic-push-php/issues/1).

If you don't know how to configure your ionic app, you can take a look here: [Setup Ionic Push](http://docs.ionic.io/services/push/#setup)

## How to use:

- Push API
- Deploy API
- Auth API


## Contributing:
1. Fork it
1. Create your feature branch (git checkout -b my-new-feature)
1. Commit your changes (git commit -m 'Add some feature')
1. Push to the branch (git push origin my-new-feature)
1. Create new Pull Request
