# Statbench

[![tests](https://github.com/memassist/statbench/workflows/tests/badge.svg)](https://github.com/memassist/statbench/actions)
[![codecov](https://codecov.io/gh/memassist/statbench/branch/main/graph/badge.svg?token=FKAI48NUW3)](https://codecov.io/gh/memassist/statbench)
[![license](https://img.shields.io/github/license/memassist/statbench)](LICENSE)

A PHP package for timing the execution of a program or a block of code.

Accurately measuring small wall-clock execution times is not always possible because there is a considerable statistical error. Regardless of the method used to retrieve the timestamps for the measurement, a slightly different execution time will always be measured on each execution of a program. This is due to a number of factors. For example, the program under consideration is not the only one executed at the time of measurement and the CPU is also used by other software at all times, including background processes, that may distort the measurement. A common approach to get a more accurate measurement is to execute the program multiple times, measure the execution time for each one of them and use the average or the median of these numbers. In this way, more executions entail a more accurate measurement.

Statbench performs multiple executions of the program, on each one of which it records the execution time and uses the [median](https://en.wikipedia.org/wiki/Median) and [median-absolute-deviation](https://en.wikipedia.org/wiki/Median_absolute_deviation) values on all the previous measurements to remove the [outliers](https://en.wikipedia.org/wiki/Outlier) and calculate an uncertainty for the result. The process stops when a desired uncertainty is reached.

This method provides a *better* estimate but not a *perfect* measurement of the wall-clock execution time. Hardware aspects such as the CPU caches may also affect the execution time when a program is executed multiple times in succession.

Statbench started out as a PHP implementation of the [Dumbbench](https://metacpan.org/pod/Dumbbench) Perl module, and the two are very similar in most functionalities.

## Installation

1. [PHP](https://www.php.net/manual/en/install.php) and [Composer](https://getcomposer.org/doc/00-intro.md) need to be installed in the system and added to the PATH environment variable.

2. ...

3. ...

4. ...
   
   ```bash
   composer dump-autoload
   or
   composer install
   ```

## Usage / Getting started

...

## Notes

Building the development environment:

```bash
docker build -t php-cli-statbench-dev:latest .
```

## References

For more information on Dumbbench refer to:

- The original Perl version of Dumbbench [ [CPAN](https://metacpan.org/pod/Dumbbench) ] [ [GitHub #1](https://github.com/tsee/dumbbench) ] [ [GitHub #2](https://github.com/briandfoy/dumbbench) ]
- How Dumbbench works [ [#1-Your benchmarks suck!](http://blogs.perl.org/users/steffen_mueller/2010/09/your-benchmarks-suck.html) ] [ [#2-Hard data for timing distributions](http://blogs.perl.org/users/steffen_mueller/2010/09/hard-data-for-timing-distributions.html) ] [ [#3-The physicist's way out](http://blogs.perl.org/users/steffen_mueller/2010/09/the-physicists-way-out.html) ]

## License

This project is licensed under the terms of the MIT license - see the [LICENSE](LICENSE) file for details.
