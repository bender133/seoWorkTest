<?php
$someNumbers = [
  2,
  2,
  2,
];

// можно понять буквально и сложить фразу )))
$textNumber = [
  '50',
  'Цифр',
  'по',
  '50',
  'знаков',
];

//1 method

/**
 * @param array $someNumbers
 *
 * @return int|mixed
 */
function oneMethod(array $someNumbers) {
  $result = 0;
  foreach ($someNumbers as $number) {
    $result += $number;
  }
  return $result;
}

echo oneMethod($someNumbers) . '<hr>';

//2 method

/**
 * @param array $someNumbers
 *
 * @return float|int
 */
function twoMethod(array $someNumbers) {
  return array_sum($someNumbers);
}

echo twoMethod($someNumbers) . '<hr>';

//3 method

/**
 * @param array $someNumbers
 *
 * Тоже можно считать как способ, не сложение цифр как чисел, а сложение их как строк.
 *
 * @return string
 */
function threeMethod(array $textNumber): string {
  $result = '';
  foreach ($textNumber as $number) {
    $result .= $number;
  }
  return $result;
}

echo threeMethod($textNumber) . '<hr>';

//4 method

/**
 * @param ...$numbers
 *
 * @return int|mixed
 */
function fourMethod(...$numbers) {
  $result = 0;
  foreach ($numbers as $number) {
    $result += $number;
  }
  return $result;
}

echo fourMethod(2,2,2) . '<hr>';

//5 method

/**
 * @param array $someNumbers
 *
 * @return mixed
 */
function fiveMethod(array $someNumbers) {
  return array_reduce($someNumbers, function ($result, $item) {
    $result += $item;
    return $result;
  });
}

echo fiveMethod($someNumbers) . '<hr>';
