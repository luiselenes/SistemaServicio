numeros::[Int]->[Int]
numeros x = numeross 0 x


numeross::Int->[Int]->[Int]
numeross x (a:b)
 |b /= [] = [(a+x)]++numeross (a+x) b
 |otherwise = [(a+x)]    




ocho :: Int -> [Char]
ocho n [] = reverse (take n []) ++ drop n []