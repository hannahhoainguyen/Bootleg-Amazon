#! /bin/bash

cp ../../uvm-store/BootlegZon.php BootlegZonBarryunfixed.php
sed -f conv2 BootlegZonBarryunfixed.php  > fix.php
cp fix.php BootlegZonBarry.php

cp ../../uvm-store/Cart.php CartBarryunfixed.php
sed -f conv2 CartBarryunfixed.php  > fixC.php
cp fixC.php CartBarry.php
