<?php

/*
 * Дан целочисленный массив 'nums'. Поверните массив вправо на 'k' шагов, где 'k' — неотрицательное число.
 */

declare(strict_types=1);

function rotate(array &$nums, int $k): array
{
    $n = count($nums);

    if ($n === 0) {
        return [];
    }

    // Если k равно 0, массив не изменится
    if ($k === 0) {
        return $nums;
    }

    $k = $k % $n; // Учитываем случаи, когда $k больше $n

    // Поворот на месте
    for ($i = 0; $i < $k; $i++) {
        $last = $nums[$n - 1]; // Сохраняем последний элемент
        for ($j = $n - 1; $j > 0; $j--) {
            $nums[$j] = $nums[$j - 1];  // Сдвигаем все элементы вправо
        }
        $nums[0] = $last; // Помещаем последний элемент на первое место
    }
    return $nums;
}

/*
 * Объяснение:
Модульное деление: Сначала мы находим реальное количество поворотов, чтобы избежать лишних операций.
Смена местами: Для каждого из k поворотов:
               Сохраняем последний элемент.
               Сдвигаем все элементы вправо на одну позицию.
               Помещаем сохранённый элемент на первую позицию.
Эффективность
Временная сложность: O(n * k), где n — длина массива и k — количество поворотов.
Пространственная сложность: O(1), так как мы не используем дополнительную память, кроме переменных.
 */

/*
 * Еще один вариант решения задачи с использованием дополнительной функции. Реализация ниже.
 */

function rotate2(array $nums, int $k): array
{
    $n = count($nums);

    if ($n === 0) {
        return [];
    }

    if ($k === 0) {
        return $nums;
    }

    $k = $k % $n;
    function reverse(array &$arr, int $start, int $end): void  // Функция для реверса части массива
    {
        while ($start < $end) {
            $temp = $arr[$start];       // Меняем местами крайние элементы и двигаемся навстречу
            $arr[$start] = $arr[$end];
            $arr[$end] = $temp;
            $start ++;
            $end--;
        }
    }

    reverse($nums, 0, $n-1); // Разворачиваем весь массив
    reverse($nums, 0, $k-1); // Разворачиваем первые 'k' элементов
    reverse($nums, $k, $n-1);  // Разворачиваем оставшиеся n - k элементов

    return $nums;
}

/*
 * Объяснение:
              Модульное деление: Сначала мы находим реальное количество поворотов, чтобы избежать лишних операций.
              Реверс:Реверсируем весь массив, чтобы элементы оказались в обратном порядке.
                     Реверсируем первые k элементов, чтобы они оказались на своих местах.
                     Реверсируем оставшиеся n - k элементов для их корректного расположения.
Эффективность:
Временная сложность: O(n), где n — длина массива. Мы проходим массив всего трижды.
Пространственная сложность: O(1), так как мы не используем дополнительную память, кроме переменных для индексов.
 */

$nums = [1, 2, 3, 4, 5, 6, 7, 8];
print_r(rotate2($nums, 2));