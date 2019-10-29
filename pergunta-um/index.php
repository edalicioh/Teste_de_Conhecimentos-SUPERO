<?php
/* 
* Escreva um programa que imprima números de 1 a 100. 
* Mas, para múltiplos de 3 imprima “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. 
* Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”. 
 */

for ($i = 1; $i <= 100; $i++) { 
    $mutiplodeTres =  $i % 3; // para múltiplos de 3 
    $mutiplodeCinco = $i % 5; // para múltiplos de 5
    if( $mutiplodeTres == 0 && $mutiplodeCinco == 0   ) {
        print( " FizzBuzz<br> "); // imprima “FizzBuzz”
    } else  if( $mutiplodeTres == 0  ) {
        print( " Fizz<br> "); // imprima “Fizz”
    } else  if( $mutiplodeCinco == 0  ) {
        print(" Buzz<br> "); //imprima “Buzz”
    }
}