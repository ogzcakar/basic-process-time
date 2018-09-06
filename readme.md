# BasicProcessTime #

**Description :** The "BasicProcessTime" class allows you to see how long the processes you write work.

## Installation

    composer require ogzcakar/basic-process-time

## Usage

To print the processing time on the screen

```php
<?php

processTime('testKey');

for ($i = 0; $i <= 200000000; $i++){}

echo processTime('testKey');
```

Or if you want to log the processing time

```php
<?php

processTime('testFile');

for ($i = 0; $i <= 200000000; $i++){}

processTime('testFile', 'fileName.txt'); // Or echo processTime('testFile', 'fileName.txt');
```

## For Help and Contact

**Mail :** ogzcakar@gmail.com