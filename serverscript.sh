#! /bin/bash

cp ../../uvm-store/BootlegZon.php BootlegZonBarryunfixed.php
sed -f conv2 BootlegZonBarryunfixed.php  > fix.php
cp fix.php BootlegZonBarry.php
