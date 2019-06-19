#!/usr/bin/bash

sudo -s php ./bin/magento setup:di:compile
sudo -s php ./bin/magento setup:upgrade