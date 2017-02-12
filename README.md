# Hackathon_OrderItemComments for Magento 2

## Introduction

This small extension adds a comment field in the cart overview at the order item level instead of the order level. This allows the customer to input specific wishes per product. It is saved in the database in a seperate table and can be retrieved from there.

## Installation

First require this repository into your project;

`composer config repositories.hackathon-orderitemcomments vcs https://github.com/magento-hackathon/Hackathon_OrderItemComments/`

Then require the module;

`composer require hackathon/module-orderitemcomments:dev-master`
