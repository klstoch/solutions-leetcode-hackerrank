<?php
/*
 * Для заданного массива 'nums' размера 'n' вернуть элемент большинства .
 * Элемент большинства — это элемент, который появляется больше ⌊n / 2⌋ раз. Вы можете предположить, что элемент большинства всегда существует в массиве.
*/

declare(strict_types=1);

function majorityElement(array $nums): int
{

    $candidate = null;
    $count = 0;

    // Первый проход: определяем кандидата
    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num; // Обновляем кандидата
        }
        if ($num === $candidate) {
            $count++;  // Увеличиваем на единицу
        } else {
            $count--; // Уменьшаем на единицу
        }
    }
    return $candidate; // Возвращаем кандидата, так как условие задачи предполагает элемент большинства

}

$nums = [1, 1, 2, 2, 2, 2, 1];
echo majorityElement($nums) . PHP_EOL;