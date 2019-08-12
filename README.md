# SdoBitmask

SdoBitmask is a simple class to set flags of bitmasks

1. Sets or unsets bitmask flags.
1. Checks whether a flag is power of two.

## How to use

Define a bitmask class like this:

```php
class MyBitmask extends AbstractBitmask
{
    const IS_STATE_A = 1 << $i; // $i is a flag index starting at 0
}
```

For example:

```php
class MyBitmask extends AbstractBitmask
{
    const IS_STATE_A = 1 << 0;
    const IS_STATE_B = 1 << 1;
    const IS_STATE_C = 1 << 2;
}
```

### Set, check, unset a bitmask flag

```
$myBitmask = new MyBitmask(0);
$myBitmask->is(MyBitmask::IS_A); // false
$myBitmask->setFlag(MyBitmask::IS_A); // returns self for chaining
$myBitmask->is(MyBitmask::IS_A); // true
$myBitmask->unsetFlag(MyBitmask::IS_A); // return self for chaining
$myBitmask->is(MyBitmask::IS_A); // false
```

# Author

Me:

1. mailto:stefanie+_gth@sdo.sh

# Interesting links

1. https://alemil.com/bitmask -- Good read about bitmasks in general.

# Licence

LGPL v3 or a commercial licence :) from stefanie+_gth@sdo.sh.

# Source/Download

[Source can be found on GitHub](https://github.com/Schmidt-DevOps/sdo-bitmask.git)

# Requirements

1. PHP 7.1 (maybe also newer versions)

# How to use

## Example script

Have a look at SdoBitmaskTest.
