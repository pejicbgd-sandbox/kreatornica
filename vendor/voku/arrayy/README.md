[![Stories in Ready](https://badge.waffle.io/voku/Arrayy.png?label=ready&title=Ready)](https://waffle.io/voku/Arrayy)
[![Build Status](https://api.travis-ci.org/voku/Arrayy.svg?branch=master)](https://travis-ci.org/voku/Arrayy)
[![Coverage Status](https://coveralls.io/repos/voku/Arrayy/badge.svg?branch=master&service=github)](https://coveralls.io/github/voku/Arrayy?branch=master)
[![codecov.io](https://codecov.io/github/voku/Arrayy/coverage.svg?branch=master)](https://codecov.io/github/voku/Arrayy?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/voku/Arrayy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/voku/Arrayy/?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/b8c4c88a063545d787e2a4f1f5dfdf23)](https://www.codacy.com/app/voku/Arrayy)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1c9c7bda-18ab-46da-a9f4-f9a4db1dc45c/mini.png)](https://insight.sensiolabs.com/projects/1c9c7bda-18ab-46da-a9f4-f9a4db1dc45c)
[![Latest Stable Version](https://poser.pugx.org/voku/arrayy/v/stable)](https://packagist.org/packages/voku/arrayy) 
[![Total Downloads](https://poser.pugx.org/voku/arrayy/downloads)](https://packagist.org/packages/voku/arrayy) 
[![Latest Unstable Version](https://poser.pugx.org/voku/arrayy/v/unstable)](https://packagist.org/packages/voku/arrayy)
[![PHP 7 ready](http://php7ready.timesplinter.ch/voku/Arrayy/badge.svg)](https://travis-ci.org/voku/Arrayy)
[![License](https://poser.pugx.org/voku/arrayy/license)](https://packagist.org/packages/voku/arrayy)

[documentation via gitbooks.io](https://voku.gitbooks.io/arrayy/content/)

A PHP array manipulation library. Compatible with PHP
5.3+, PHP 7, and HHVM.

``` php
Arrayy::create(['Array', 'Array'])->unique()->append('y')->implode() // Arrayy
```

* [Instance methods](#instance-methods)
    * ["set an array value"](#set-an-array-value)
    * ["set an array value via dot-notation"](#setmixed-key-mixed-value--arrayy-immutable)
    * ["get an array value"](#get-an-array-value)
    * ["get an array value via dot-notation"](#getstring-key-null-default-null-array--mixed)
    * ["get the array"](#get-the-array)
    * ["delete an array value"](#delete-an-array-value)
    * ["check if an array value is-set"](#check-if-an-array-value-is-set)
    * ["simple loop with an Arrayy-object"](#simple-loop-with-an-arrayy-object)
    * [append](#appendmixed-value--arrayy-mutable)
    * [prepend](#prependmixed-value--arrayy-mutable)
    * [at](#atclosure-closure--arrayy-immutable)
    * [average](#averageint-decimals--intdouble)
    * [chunk](#chunkint-size-bool-preservekeys--arrayy-immutable)
    * [clean](#clean--arrayy-immutable)
    * [clear](#clear--arrayy-mutable)
    * [customSortKeys](#customsortkeysfunction--arrayy-mutable)
    * [customSortValues](#customsortvaluesfunction--arrayy-mutable)
    * [contains](#containsmixed-value--boolean)
    * [containsKey](#containskeymixed-key--boolean)
    * [diff](#diffarray-array--arrayy-immutable)
    * [diffReverse](#diffreversearray-array--arrayy-immutable)
    * [diffRecursive](#diffrecursivearray-array--arrayy-immutable)
    * [each](#eachclosure-closure--arrayy-immutable)
    * [exists](#existsclosure-closure--boolean)
    * [filter](#filterclosurenull-closure--arrayy-immutable)
    * [filterBy](#filterby--arrayy-immutable)
    * [find](#findclosure-closure--mixed)
    * [first](#first--mixed)
    * [firstsMutable](#firstsmutablenullint-take--arrayy-mutable)
    * [firstsImmutable](#firstsimmutablenullint-take--arrayy-immutable)
    * [flip](#flip--arrayy-immutable)
    * [getColumn](#getcolumnmixed-columnkey-mixed-indexkey--arrayy)
    * [getIterator](#getiterator)
    * [implode](#implodestring-with--string)
    * [initial](#initialint-to--arrayy-immutable)
    * [intersection](#intersectionarray-search--arrayy-immutable)
    * [intersects](#intersectsarray-search--boolean)
    * [isAssoc](#isassoc--boolean)
    * [isMultiArray](#ismultiarray--boolean)
    * [keys](#keys--arrayy-immutable)
    * [last](#last--mixed)
    * [lastsImmutable](#lastsimmutablenullint-take--arrayy-immutable)
    * [lastsMutable](#lastsmutablenullint-take--arrayy-mutable)
    * [length](#length--int)
    * [max](#max--mixed)
    * [matches](#matchesclosure-closure--boolean)
    * [matchesAny](#matchesanyclosure-closure--boolean)
    * [mergeAppendKeepIndex](#mergeappendkeepindexarray-array--arrayy-immutable)
    * [mergePrependKeepIndex](#mergeprependkeepindexarray-array--arrayy-immutable)
    * [mergeAppendNewIndex](#mergeappendnewindexarray-array--arrayy-immutable)
    * [mergePrependNewIndex](#mergeprependnewindexarray-array--arrayy-immutable)
    * [min](#min--mixed)
    * [randomKey](#randomkey--mixed)
    * [randomKeys](#randomkeys--arrayy-immutable)
    * [randomValue](#randomvalue--mixed)
    * [randomValues](#randomvalues--arrayy-immutable)
    * [randomImmutable](#randomimmutableintnull-take--arrayy-immutable)
    * [randomMutable](#randommutableintnull-take--arrayy-mutable)
    * [randomWeighted](#randomweightedarray-array-intnull-take--arrayy-immutable)
    * [reduce](#reducecallable-predicate-array-init--arrayy-immutable)
    * [reindex](#reindex--arrayy-mutable)
    * [reject](#rejectclosure-closure--arrayy-immutable)
    * [remove](#removemixed-key--immutable)
    * [removeFirst](#removefirst--arrayy-immutable)
    * [removeLast](#removelast--arrayy-immutable)
    * [removeValue](#removevaluemixed-value--arrayy-immutable)
    * [replace](#replacearray-keys--arrayy-immutable)
    * [replaceAllKeys](#replaceallkeysarray-keys--arrayy-immutable)
    * [replaceAllValues](#replaceallvaluesarray-array--arrayy-immutable)
    * [replaceKeys](#replacekeysarray-keys--arrayy-immutable)
    * [replaceOneValue](#replaceonevaluemixed-search-mixed-replacement--arrayy-immutable)
    * [replaceValues](#replacevaluesstring-search-string-replacement--arrayy-immutable)
    * [rest](#restint-from--arrayy-immutable)
    * [reverse](#reverse--arrayy-mutable)
    * [searchIndex](#searchindexmixed-value--mixed)
    * [searchValue](#searchvaluemixed-index--arrayy-immutable)
    * [sort](#sortstringintsort_asc-direction-intsort_regular-strategy-boolfalse-keepkeys--arrayy-mutable)
    * [sorter](#sorternullcallable-sorter-stringintsort_asc-direction-intsort_regular-strategy--arrayy-immutable)
    * [sortKeys](#sortkeysstringintsort_asc-direction--arrayy-mutable)
    * [sortValueNewIndex](#sortvaluenewindexstringintsort_asc-direction-intsort_regular-strategy--arrayy-immutable)
    * [sortValueKeepIndex](#sortvaluekeepindexstringintsort_asc-direction-intsort_regular-strategy--arrayy-immutable)
    * [split](#splitint2-numberofpieces-boolfalse-keepkeys--arrayy-immutable)
    * [shuffle](#shuffle--arrayy-immutable)
    * [toJson](#tojson--string)
    * [unique](#unique--arrayy-mutable)
    * [values](#values--arrayy-immutable)
    * [walk](#walk--arrayy-mutable)
* [Tests](#tests)
* [License](#license)

## Installation via "composer require"
```shell
composer require voku/arrayy
```

## Installation via composer (manually)

If you're using Composer to manage dependencies, you can include the following
in your composer.json file:

```json
"require": {
    "voku/arrayy": "~2.0"
}
```

Then, after running `composer update` or `php composer.phar update`, you can
load the class using Composer's autoloading:

```php
require 'vendor/autoload.php';
```

And in either case, I'd suggest using an alias.

```php
use Arrayy\Arrayy as A;
```

## OO and Chaining

The library offers OO method chaining, as seen below:

```php
echo a(['fòô', 'bàř', 'bàř'])->unique()->reverse()->implode(','); // 'bàř,fòô'
```

## Implemented Interfaces

`Arrayy\Arrayy` implements the `IteratorAggregate` interface, meaning that
`foreach` can be used with an instance of the class:

``` php
$arrayy = a(['fòôbàř', 'foo']);
foreach ($arrayy as $value) {
    echo $value;
}
// 'fòôbàř'
// 'foo'
```

It implements the `Countable` interface, enabling the use of `count()` to
retrieve the number of elements in the array:

``` php
$arrayy = a(['fòô', 'foo']);
count($arrayy);  // 2
```

## PHP 5.6 Creation

As of PHP 5.6, [`use function`](https://wiki.php.net/rfc/use_function) is
available for importing functions. Arrayy exposes a namespaced function,
`Arrayy\create`, which emits the same behaviour as `Arrayy\Arrayy::create()`.
If running PHP 5.6, or another runtime that supports the `use function` syntax,
you can take advantage of an even simpler API as seen below:

``` php
use function Arrayy\create as a;

// Instead of: A::create(['fòô', 'bàř'])->reverse()->implode();
a(['fòô', 'bàř'])->reverse()->implode(','); // 'bàř,fòô'
```

## StaticArrayy

All methods listed under "Instance methods" are available as part of a static
wrapper.

```php
use Arrayy\StaticArrayy as A;

// Translates to Arrayy::create(['fòô', 'bàř'])->reverse();
// Returns an Arrayy object with the array
A::reverse(['fòô', 'bàř']);
```

## Class methods

##### use a "default object" 

Creates an Arrayy object.

```php
$arrayy = new Arrayy(array('fòô', 'bàř')); // Array['fòô', 'bàř']
```

##### create(array $array) : Arrayy (Immutable)

Creates an Arrayy object, via static "create()"-method

```php
$arrayy = A::create(array('fòô', 'bàř')); // Array['fòô', 'bàř']
```

##### createByReference(array &$array) : Arrayy (Mutable)

WARNING: Creates an Arrayy object by reference.

```php
$array = array('fòô', 'bàř');
$arrayy = A::createByReference($array); // Array['fòô', 'bàř']
```

##### createFromJson(string $json) : Arrayy (Immutable)

Create an new Arrayy object via JSON.

```php
$str = '{"firstName":"John", "lastName":"Doe"}';
$arrayy = A::createFromJson($str); // Arrayy['firstName' => 'John', 'lastName' => 'Doe']
```

##### createFromObject(ArrayAccess $object) : Arrayy (Immutable)

Create an new instance filled with values from an object that have implemented ArrayAccess.

```php
$object = A::create(1, 'foo');
$arrayy = A::createFromObject($object); // Arrayy[1, 'foo']
```

##### createWithRange() : Arrayy (Immutable)

Create an new instance containing a range of elements.

```php
$arrayy = A::createWithRange(2, 4); // Arrayy[2, 3, 4]
```

##### createFromString(string $str) : Arrayy (Immutable)

Create an new Arrayy object via string.

```php
$arrayy = A::createFromString(' foo, bar '); // Arrayy['foo', 'bar']
```

## Instance Methods

Arrayy: All examples below make use of PHP 5.6
function importing, and PHP 5.4 short array syntax. For further details,
see the documentation for the create method above, as well as the notes
on PHP 5.6 creation.

##### "set an array value"

```php
$arrayy = a(['fòô' => 'bàř']);
$arrayy['foo'] = 'bar';
var_dump($arrayy); // Arrayy['fòô' => 'bàř', 'foo' => 'bar']
```

##### "get an array value"

```php
$arrayy = a(['fòô' => 'bàř']);
var_dump($arrayy['fòô']); // 'bàř'
```

##### "get the array"

```php
$arrayy = a(['fòô' => 'bàř']);
var_dump($arrayy->getArray()); // ['fòô' => 'bàř']
```

##### "delete an array value"

```php
$arrayy = a(['fòô' => 'bàř', 'lall']);
unset($arrayy['fòô']);
var_dump($arrayy); // Arrayy[0 => 'lall']
```

##### "check if an array value is-set"

```php
$arrayy = a(['fòô' => 'bàř']);
isset($arrayy['fòô']); // true
```

##### "simple loop with an Arrayy-object"
 
```php
$arrayy = a(['fòô' => 'bàř'];
foreach ($arrayy) as $key => $value) {
  echo $key . ' | ' . $value; // fòô | bàř
}
```

##### append(mixed $value) : Arrayy (Mutable)

Append a value to the current array.

alias: "Arrayy->add()"

```php
a(['fòô' => 'bàř'])->append('foo'); // Arrayy['fòô' => 'bàř', 0 => 'foo']
```

##### prepend(mixed $value) : Arrayy (Mutable)

Prepend a value to the current array.

```php
a(['fòô' => 'bàř'])->prepend('foo'); // Arrayy[0 => 'foo', 'fòô' => 'bàř']
```

##### at(Closure $closure) : Arrayy (Immutable)

Iterate over the current array and execute a callback for each loop.

```php
$result = A::create();
$closure = function ($value, $key) use ($result) {
  $result[$key] = ':' . $value . ':';
};
a(['foo', 'bar' => 'bis'])->at($closure); // Arrayy[':foo:', 'bar' => ':bis:']
```

##### average(int $decimals) : int|double

Returns the average value of the current array.

```php
a([-9, -8, -7, 1.32])->average(2); // -5.67
```

##### chunk(int $size, bool $preserveKeys) : Arrayy (Immutable)

Create a chunked version of the current array.

```php
a([-9, -8, -7, 1.32])->chunk(2); // Arrayy[[-9, -8], [-7, 1.32]]
```

##### clean() : Arrayy (Immutable)

Clean all falsy values from the current array.

```php
a([-8 => -9, 1, 2 => false])->clean(); // Arrayy[-8 => -9, 1]
```

##### clear() : Arrayy (Mutable)

WARNING!!! -> Clear the current array.

```php
a([-8 => -9, 1, 2 => false])->clear(); // Arrayy[]
```

##### customSortKeys($function) : Arrayy (Mutable) 

Custom sort by index via "uksort".

```php
$callable = function ($a, $b) {
  if ($a == $b) {
    return 0;
  }
  return ($a > $b) ? 1 : -1;
};
$arrayy = a(['three' => 3, 'one' => 1, 'two' => 2]);
$resultArrayy = $arrayy->customSortKeys($callable); // Arrayy['one' => 1, 'three' => 3, 'two' => 2]
```

##### customSortValues($function) : Arrayy (Mutable) 

Custom sort by value via "usort".

```php
$callable = function ($a, $b) {
  if ($a == $b) {
    return 0;
  }
  return ($a > $b) ? 1 : -1;
};
$arrayy = a(['three' => 3, 'one' => 1, 'two' => 2]);
$resultArrayy = $arrayy->customSortValues($callable); // Arrayy['one' => 1, 'two' => 2, 'three' => 3]
```

##### contains(mixed $value) : boolean

Check if an item is in the current array.

```php
a([1, true])->contains(true); // true
```

##### containsKey(mixed $key) : boolean

Check if the given key/index exists in the array.

```php
a([1 => true])->containsKey(1); // true
```

##### diff(array $array) : Arrayy (Immutable)

Return values that are only in the current array.

```php
a([1 => 1, 2 => 2])->diff([1 => 1]); // Arrayy[2 => 2]
```

##### diffReverse(array $array) : Arrayy (Immutable)

Return values that are only in the new $array.

```php
a([1 => 1])->diffReverse([1 => 1, 2 => 2]); // Arrayy[2 => 2]
```

##### diffRecursive(array $array, null|array $helperVariableForRecursion) : Arrayy (Immutable)

Return values that are only in the current multi-dimensional array.

```php
a([1 => [1 => 1], 2 => [2 => 2]])->diffRecursive([1 => [1 => 1]]); // Arrayy[2 => [2 => 2]]
```

##### each(Closure $closure) : Arrayy (Immutable)

Iterate over the current array and modify the array's value.

```php
$result = A::create();
$closure = function ($value) {
  return ':' . $value . ':';
};
a(['foo', 'bar' => 'bis'])->each($closure); // Arrayy[':foo:', 'bar' => ':bis:']
```

##### exists(Closure $closure) : boolean

```php
$callable = function ($value, $key) {
  return 2 === $key and 'two' === $value;
};
a(['foo', 2 => 'two'])->exists($callable); // true
```

##### filter(Closure|null $closure) : Arrayy (Immutable)

Find all items in an array that pass the truth test.

```php
$closure = function ($value) {
  return $value % 2 !== 0;
}
a([1, 2, 3, 4])->filter($closure); // Arrayy[0 => 1, 2 => 3]
```

##### filterBy() : Arrayy (Immutable)

Filters an array of objects (or a numeric array of associative arrays)
based on the value of a particular property within that.

```php
$array = [
  0 => ['id' => 123, 'name' => 'foo', 'group' => 'primary', 'value' => 123456, 'when' => '2014-01-01'],
  1 => ['id' => 456, 'name' => 'bar', 'group' => 'primary', 'value' => 1468, 'when' => '2014-07-15'],
};        
a($array)->filterBy('name', 'foo'); // Arrayy[0 => ['id' => 123, 'name' => 'foo', 'group' => 'primary', 'value' => 123456, 'when' => '2014-01-01']]
```

##### find(Closure $closure) : mixed

Find the first item in an array that passes the truth test, otherwise return false.

```php
$search = 'foo';
$closure = function ($value, $key) use ($search) {
  return $value === $search;
};
a(['foo', 'bar', 'lall'])->find($closure); // 'foo'
```

##### first() : mixed

Get the first value from the current array and return null if there wasn't a element.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->first(); // 'foo'
```

##### firstsMutable(null|int $take) : Arrayy (Mutable)

Get the first value(s) from the current array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->firsts(2); // Arrayy[0 => 'foo', 1 => 'bar']
```

##### firstsImmutable(null|int $take) : Arrayy (Immutable)

Get the first value(s) from the current array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->firsts(2); // Arrayy[0 => 'foo', 1 => 'bar']
```

##### flip() : Arrayy (Immutable)

Exchanges all keys with their associated values in an array.

```php
a([0 => 'foo', 1 => 'bar'])->flip(); // Arrayy['foo' => 0, 'bar' => 1]
```

##### get(string $key, [null $default], [null $array]) : mixed

Get a value from an array (optional using dot-notation).

```php
$arrayy = a(['Lars' => ['lastname' => 'Moelleken']]);
$arrayy->get('Lars.lastname'); // 'Moelleken'
```

##### getColumn(mixed $columnKey, mixed $indexKey) : Arrayy

Returns the values from a single column of the input array, identified by
the $columnKey, can be used to extract data-columns from multi-arrays.

```php
a([['foo' => 'bar', 'id' => 1], ['foo => 'lall', 'id' => 2]])->getColumn('foo', 'id'); // Arrayy[1 => 'bar', 2 => 'lall']
```

##### getIterator()

Returns a new ArrayIterator, thus implementing the IteratorAggregate interface.

```php
a(['foo', 'bar'])->getIterator(); // ArrayIterator['foo', 'bar']
```

##### implode(string $with) : string

Implodes an array.

```php
a([0 => -9, 1, 2])->implode('|'); // '-9|1|2'
```

##### initial(int $to) : Arrayy (Immutable)

Get everything but the last..$to items.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->initial(2); // Arrayy[0 => 'foo']
```

##### intersection(array $search) : Arrayy (Immutable)

Return an array with all elements found in input array.

```php
a(['foo', 'bar'])->intersection(['bar', 'baz']); // Arrayy['bar']
```

##### intersects(array $search) : boolean

Return a boolean flag which indicates whether the two input arrays have any common elements.

```php
a(['foo', 'bar'])->intersects(['föö', 'bär']); // false
```

##### isAssoc() : boolean

Check if we have named keys in the current array.

```php
a(['foo' => 'bar', 2, 3])->isAssoc(); // true
```

##### isMultiArray() : boolean

Check if the current array is a multi-array.

```php
a(['foo' => [1, 2 , 3]])->isMultiArray(); // true
```

##### keys() : Arrayy (Immutable)

Get all keys from the current array.

alias: "Arrayy->getKeys()"

```php
$arrayy = a([1 => 'foo', 2 => 'foo2', 3 => 'bar']);
$arrayy->keys(); // Arrayy[1, 2, 3]
```

##### last() : mixed

Get the last value from the current array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->last(); // 'lall'
```

##### lastsImmutable(null|int $take) : Arrayy (Immutable)

Get the last value(s) from the current array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->lasts(2); // Arrayy[0 => 'bar', 1 => 'lall']
```

##### lastsMutable(null|int $take) : Arrayy (Mutable)

Get the last value(s) from the current array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->lasts(2); // Arrayy[0 => 'bar', 1 => 'lall']
```

##### length() : int

Count the values from the current array.

alias: "Arrayy->count()" || "Arrayy->size()"

```php
a([-9, -8, -7, 1.32])->length(); // 4
```

##### max() : mixed

Get the max value from an array.

```php
a([-9, -8, -7, 1.32])->max(); // 1.32
```

##### matches(Closure $closure) : boolean

Check if all items in an array match a truth test.

```php
$closure = function ($value, $key) {
  return ($value % 2 === 0);
};
a([2, 4, 8])->matches($closure); // true
```

##### matchesAny(Closure $closure) : boolean

Check if any item in an array matches a truth test.

```php
$closure = function ($value, $key) {
  return ($value % 2 === 0);
};
a([1, 4, 7])->matches($closure); // true
```

##### mergeAppendKeepIndex(array $array) : Arrayy (Immutable)

Merge the new $array into the current array.

- keep key,value from the current array, also if the index is in the new $array

```php
$array1 = [1 => 'one', 'foo' => 'bar1'];
$array2 = ['foo' => 'bar2', 3 => 'three'];
a($array1)->mergeAppendKeepIndex($array2); // Arrayy[1 => 'one', 'foo' => 'bar2', 3 => 'three']
```

##### mergePrependKeepIndex(array $array) : Arrayy (Immutable)

Merge the the current array into the $array.

- use key,value from the new $array, also if the index is in the current array
   
```php
$array1 = [1 => 'one', 'foo' => 'bar1'];
$array2 = ['foo' => 'bar2', 3 => 'three'];
a($array1)->mergePrependKeepIndex($array2); // Arrayy['foo' => 'bar1', 3 => 'three', 1 => 'one']
```

##### mergeAppendNewIndex(array $array) : Arrayy (Immutable)

Merge the new $array into the current array.

- replace duplicate assoc-keys from the current array with the key,values from the new $array
- create new indexes

```php
$array1 = [1 => 'one', 'foo' => 'bar1'];
$array2 = ['foo' => 'bar2', 3 => 'three'];
a($array1)->mergeAppendNewIndex($array2); // Arrayy[0 => 'one', 'foo' => 'bar2', 1 => three']
```

##### mergePrependNewIndex(array $array) : Arrayy (Immutable)

Merge the current array into the new $array.

- replace duplicate assoc-keys from new $array with the key,values from the current array
- create new indexes

```php
$array1 = [1 => 'one', 'foo' => 'bar1'];
$array2 = ['foo' => 'bar2', 3 => 'three'];
a($array1)->mergePrependNewIndex($array2); // Arrayy['foo' => 'bar1', 0 => 'three', 1 => 'one']
```

##### min() : mixed

Get the min value from an array.

```php
a([-9, -8, -7, 1.32])->min(); // -9
```

##### randomKey() : mixed

Pick a random key/index from the keys of this array.

alias: "Arrayy->getRandomKey()"

```php
$arrayy = A::create([1 => 'one', 2 => 'two']);
$arrayy->randomKey(); // e.g. 2
```

##### randomKeys() : Arrayy (Immutable)

Pick a given number of random keys/indexes out of this array.

alias: "Arrayy->getRandomKeys()"

```php
$arrayy = A::create([1 => 'one', 2 => 'two']);
$arrayy->randomKeys(); // e.g. Arrayy[1, 2]
```

##### randomValue() : mixed

Pick a random value from the values of this array.

alias: "Arrayy->getRandomValue()"

```php
$arrayy = A::create([1 => 'one', 2 => 'two']);
$arrayy->randomValue(); // e.g. 'one'
```

##### randomValues() : Arrayy (Immutable)

Pick a given number of random values out of this array.

alias: "Arrayy->getRandomValues()"

```php
$arrayy = A::create([1 => 'one', 2 => 'two']);
$arrayy->randomValues(); // e.g. Arrayy['one', 'two']
```

##### randomImmutable(int|null $take) : Arrayy (Immutable)

Get a random string from an array.

alias: "Arrayy->getRandom()"

```php
a([1, 2, 3, 4])->randomImmutable(2); // e.g.: Arrayy[1, 4]
```

##### randomMutable(int|null $take) : Arrayy (Mutable)

Get a random string from an array.

```php
a([1, 2, 3, 4])->randomMutable(2); // e.g.: Arrayy[1, 4]
```

##### randomWeighted(array $array, int|null $take) : Arrayy (Immutable)

Get a random value from an array, with the ability to skew the results.
   
```php
a([0 => 3, 1 => 4])->randomWeighted([1 => 4]); // e.g.: Arrayy[4] (has a 66% chance of returning 4)
```

##### reduce(callable $predicate, array $init) : Arrayy (Immutable)

Reduce the current array via callable e.g. anonymous-function.

```php
function myReducer($resultArray, $value) {
  if ($value == 'foo') {
    $resultArray[] = $value;
  }
  return $resultArray;
};
a(['foo', 'bar'])->reduce('myReducer'); // Arrayy['foo']
```

##### reindex() : Arrayy (Mutable)

Create a numerically re-indexed Arrayy object.

```php
a([2 => 1, 3 => 2])->reindex(); // Arrayy[0 => 1, 1 => 2]
```

##### reject(Closure $closure) : Arrayy (Immutable)

Return all items that fail the truth test.

```php
$closure = function ($value) {
  return $value % 2 !== 0;
}
a([1, 2, 3, 4])->reject($closure); // Arrayy[1 => 2, 3 => 4]
```

##### remove(mixed $key) : (Immutable)

Remove a value from the current array (optional using dot-notation).

```php
a([1 => 'bar', 'foo' => 'foo'])->remove(1); // Arrayy['foo' => 'foo']
```

##### removeFirst() : Arrayy (Immutable)

Remove the first value from the current array.

```php
a([1 => 'bar', 'foo' => 'foo'])->removeFirst(); // Arrayy['foo' => 'foo']
```

##### removeLast() : Arrayy (Immutable)

Remove the last value from the current array.

```php
a([1 => 'bar', 'foo' => 'foo'])->removeLast(); // Arrayy[1 => 'bar']
```

##### removeValue(mixed $value) : Arrayy (Immutable)

Removes a particular value from an array (numeric or associative).

```php
a([1 => 'bar', 'foo' => 'foo'])->removeValue('foo'); // Arrayy[1 => 'bar']
```

##### replace(array $keys) : Arrayy (Immutable)

Replace a key with a new key/value pair.

```php
$arrayy = a([1 => 'foo', 2 => 'foo2', 3 => 'bar']);
$arrayy->replace(2, 'notfoo', 'notbar'); // Arrayy[1 => 'foo', 'notfoo' => 'notbar', 3 => 'bar']
```

##### replaceAllKeys(array $keys) : Arrayy (Immutable)

Create an array using the current array as values and the other array as keys.

```php
$firstArray = array(
    1 => 'one',
    2 => 'two',
    3 => 'three',
);
$secondArray = array(
    'one' => 1,
    1     => 'one',
    2     => 2,
);
$arrayy = a($firstArray);
$arrayy->replaceAllKeys($secondArray); // Arrayy[1 => "one", 'one' => "two", 2 => "three"]
```

##### replaceAllValues(array $array) : Arrayy (Immutable)

Create an array using the current array as keys and the other array as values.

```php
$firstArray = array(
    1 => 'one',
    2 => 'two',
    3 => 'three',
);
$secondArray = array(
    'one' => 1,
    1     => 'one',
    2     => 2,
);
$arrayy = a($firstArray);
$arrayy->replaceAllValues($secondArray); // Arrayy['one' => 1, 'two' => 'one', 'three' => 2]
```

##### replaceKeys(array $keys) : Arrayy (Immutable)

Replace the keys in an array with another set.

WARNING: An array of keys must matching the array's size and order!

```php
a([1 => 'bar', 'foo' => 'foo'])->replaceKeys([1 => 2, 'foo' => 'replaced']); // Arrayy[2 => 'bar', 'replaced' => 'foo']
```

##### replaceOneValue(mixed $search, mixed $replacement) : Arrayy (Immutable)

Replace the first matched value in an array.

```php
$testArray = ['bar', 'foo' => 'foo', 'foobar' => 'foobar'];
a($testArray)->replaceOneValue('foo', 'replaced'); // Arrayy['bar', 'foo' => 'replaced', 'foobar' => 'foobar']
```

##### replaceValues(string $search, string $replacement) : Arrayy (Immutable)

Replace values in the current array.

```php
$testArray = ['bar', 'foo' => 'foo', 'foobar' => 'foobar'];
a($testArray)->replaceValues('foo', 'replaced'); // Arrayy['bar', 'foo' => 'replaced', 'foobar' => 'replacedbar']
```

##### rest(int $from) : Arrayy (Immutable)

Get the last elements from index $from until the end of this array.

```php
a([2 => 'foo', 3 => 'bar', 4 => 'lall'])->rest(2); // Arrayy[0 => 'lall']
```

##### reverse() : Arrayy (Mutable)

Return the array in the reverse order.

```php
a([1, 2, 3])->reverse(); // self[3, 2, 1]
```

##### searchIndex(mixed $value) : mixed

Search for the first index of the current array via $value.

```php
a(['fòô' => 'bàř', 'lall' => 'bàř'])->searchIndex('bàř'); // Arrayy[0 => 'fòô']
```

##### searchValue(mixed $index) : Arrayy (Immutable)

Search for the value of the current array via $index.

```php
a(['fòô' => 'bàř'])->searchValue('fòô'); // Arrayy[0 => 'bàř']
```

##### set(mixed $key, mixed $value) : Arrayy (Immutable)

Set a value for the current array (optional using dot-notation).

```php
$arrayy = a(['Lars' => ['lastname' => 'Moelleken']]);
$arrayy->set('Lars.lastname', 'Müller'); // Arrayy['Lars', ['lastname' => 'Müller']]]
```

##### setAndGet()

Get a value from a array and set it if it was not.

WARNING: this method only set the value, if the $key is not already set

```php
$arrayy = a([1 => 1, 2 => 2, 3 => 3]);
$arrayy->setAndGet(1, 4); // 1
$arrayy->setAndGet(0, 4); // 4
```

##### serialize() : string

Serialize the current array.

```php
a([1, 4, 7])->serialize(); // 'a:3:{i:0;i:1;i:1;i:4;i:2;i:7;}'
```

##### unserialize(string $string) : Arrayy (Mutable)
 
Unserialize an string and return this object.

```php
a()->unserialize('a:3:{i:0;i:1;i:1;i:4;i:2;i:7;}'); // Arrayy[1, 4, 7]
```

##### sort(string|int(SORT_ASC) $direction, int(SORT_REGULAR) $strategy, bool(false) $keepKeys) : Arrayy (Mutable)

Sort the current array and optional you can keep the keys.

- $direction e.g.: [SORT_ASC, SORT_DESC, 'ASC', 'asc', 'DESC', 'desc']
- $strategy e.g.: [SORT_REGULAR, SORT_NATURAL, ...]

```php
a(3 => 'd', 2 => 'f', 0 => 'a')->sort(SORT_ASC, SORT_NATURAL, false); // Arrayy[0 => 'a', 1 => 'd', 2 => 'f']
```

##### sorter(null|callable $sorter, string|int(SORT_ASC) $direction, int(SORT_REGULAR) $strategy) : Arrayy (Immutable)

Sort a array by value, by a closure or by a property.

- If the sorter is null (default), the array is sorted naturally.
- Associative (string) keys will be maintained, but numeric keys will be re-indexed.
- $direction e.g.: [SORT_ASC, SORT_DESC, 'ASC', 'asc', 'DESC', 'desc']
- $strategy e.g.: [SORT_REGULAR, SORT_NATURAL, ...]

```php
$testArray = range(1, 5);
$under = a($testArray)->sorter(
  function ($value) {
    return $value % 2 === 0;
  }
);
var_dump($under); // Arrayy[1, 3, 5, 2, 4]
```

##### sortKeys(string|int(SORT_ASC) $direction) : Arrayy (Mutable)

Sort the current array by key by $direction = 'asc' or $direction = 'desc'.

- $direction e.g.: [SORT_ASC, SORT_DESC, 'ASC', 'asc', 'DESC', 'desc']

```php
a([1 => 2, 0 => 1])->sortKeys('asc'); // Arrayy[0 => 1, 1 => 2]
```

##### sortValueNewIndex(string|int(SORT_ASC) $direction, int(SORT_REGULAR) $strategy) : Arrayy (Immutable)

Sort the current array by value.

- $direction e.g.: [SORT_ASC, SORT_DESC, 'ASC', 'asc', 'DESC', 'desc']
- $strategy e.g.: [SORT_REGULAR, SORT_NATURAL, ...]

```php
a(3 => 'd', 2 => 'f', 0 => 'a')->sortValueNewIndex(SORT_ASC, SORT_NATURAL); // Arrayy[0 => 'a', 1 => 'd', 2 => 'f']
```

##### sortValueKeepIndex(string|int(SORT_ASC) $direction, int(SORT_REGULAR) $strategy) : Arrayy (Immutable)

Sort the current array by value.

- $direction e.g.: [SORT_ASC, SORT_DESC, 'ASC', 'asc', 'DESC', 'desc']
- $strategy e.g.: [SORT_REGULAR, SORT_NATURAL, ...]

```php
a(3 => 'd', 2 => 'f', 0 => 'a')->sortValueNewIndex(SORT_ASC, SORT_REGULAR); // Arrayy[0 => 'a', 3 => 'd', 2 => 'f']
```

##### split(int(2) $numberOfPieces, bool(false) $keepKeys) : Arrayy (Immutable)

Split an array in the given amount of pieces.
   
```php
a(['a' => 1, 'b' => 2])->split(2, true); // Arrayy[['a' => 1], ['b' => 2]]
```

##### shuffle() : Arrayy (Immutable)

Shuffle the current array.

```php
a([1 => 'bar', 'foo' => 'foo'])->shuffle(); // e.g.: Arrayy[['foo' => 'foo', 1 => 'bar']]
```

##### toJson() : string

Convert the current array to JSON.

```php
a(['bar', array('foo')])->toJson(); // '["bar",{"1":"foo"}]'
```

##### unique() : Arrayy (Mutable)

Return a duplicate free copy of the current array.

```php
a([1, 2, 2])->unique(); // Arrayy[1, 2]
```

##### values() : Arrayy (Immutable)

Get all values from a array.

```php
$arrayy = a([1 => 'foo', 2 => 'foo2', 3 => 'bar']);
$arrayyTmp->values(); // Arrayy[0 => 'foo', 1 => 'foo2', 2 => 'bar']
```

##### walk() : Arrayy (Mutable)

Apply the given function to every element in the array, discarding the results.

```php
$callable = function (&$value, $key) {
  $value = $key;
};
$arrayy = a([1, 2, 3]);
$arrayy->walk($callable); // Arrayy[0, 1, 2]
```

## Tests

From the project directory, tests can be ran using `phpunit`

## License

Released under the MIT License - see `LICENSE.txt` for details.