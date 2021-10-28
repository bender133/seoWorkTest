<?php

$someNumbers = [
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
  '11111111111111111111111111111111111111111111111111',
];

// можно понять буквально и сложить фразу )))
$textNumber = [
  '50',
  'Цифр',
  'по',
  '50',
  'знаков',
];

// Можно интерпретировать иначе и сложить числа как строки.
/**
 * @param array $textNumber
 *
 * @return string
 */
function oneMethod(array $textNumber): string {

  return implode('', $textNumber);
}

/**
 * @param array $someNumbers
 *
 * @return string
 */
function twoMethod(array $someNumbers): string {
  $prev = '0';
  foreach ($someNumbers as $number) {
    $prev = gmp_add($prev, $number);
  }

  return gmp_strval($prev);
}

/**
 * @param string $num1
 * @param string $num2
 *
 * @return string
 */
function threeMethod(string $num1, string $num2): string {
  $result = '';
  $max = max($num1, $num2);
  $min = min($num1, $num2);
  $min = (int) $min === 0 ?: str_pad($min,strlen($max),'0',STR_PAD_LEFT);
  $dec = 0;

  for ($i = strlen($max) - 1; $i >= 0 ; $i--) {
    $sum = $max[$i] + $min[$i] + $dec;
    $dec = intdiv($sum, 10);
    $result .= ($dec === 1) ? $sum % 10 : $sum;
  }
  $result .= $dec ?: '';

  return strrev($result);
}

/**
 * @param $num1
 * @param $num2
 *
 * @return string
 */
function fourMethod($num1, $num2): string {

  return bcadd($num1, $num2);
}

/**
 * @param array $someNumbers
 * @param callable $callback
 *
 * @return string
 */
function sumHelper(array $someNumbers, callable $callback): string {
  $prev = '0';
  foreach ($someNumbers as $number) {
    $prev = $callback($prev, $number);
  }

  return $prev;
}

echo '1- ' . oneMethod($textNumber) . '<hr>';
echo '2- ' . twoMethod($someNumbers) . '<hr>';
echo '3- ' . sumHelper($someNumbers, 'threeMethod') . '<hr>';
echo '4- ' . sumHelper($someNumbers, 'fourMethod') . '<hr>';
echo '5- ' . oneMethod($someNumbers) . '<hr>';
