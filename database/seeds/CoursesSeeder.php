<?php

use App\Block;
use App\Category;
use App\Course;
use App\Lesson;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Математика', 'Программирование', 'Экономика'];
        foreach ($categories as $c) {
            Category::create([
                'name' => $c
            ]);
        }
        $course = Course::Create([
            'name' => 'Дифференциальные уравнения',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'diff_eq.jpeg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Уравнения первого порядка'];
        $blocks = [];

        foreach ($names as $k => $n) {
            $blocks[] = Block::Create([
                'course_id' => $course->id,
                'name' => $n,
                'active' => true,
                'sort' => $k
            ]);
        }

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Основные понятия и определения',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Дифференциальным уравнением** называется уравнение, связывающее независимую переменную х, искомую функцию y = y (x) и ее производные $y... y^{(n)}$, т.е. уравнения вида $F(x,y,y,y,...,y^{(n)}$)

Дифференциальное уравнение называется **обыкновенным**, если искомая функция y имеет вид y = y(x) (т.е функция одной независимой переменной)

**Порядком** дифференциального уравнения называется порядок наивысшей производной, входящей в уравнение

**Решением** дифференциального уравнения n-го порядка на интервале (a, b) называется функция $y=\gamma(x)$, определенная на (a, b) вместе со своими производными до n-го порядка включительно, и такая что ее подстановка в дифференциальное уравнение, превращает его в тождество по x на (a, b).

График решения дифференциального уравнения называется **интегральной кривой** этого уравнения.

### Формы задания

* Общий вид: $f(x,y,y)=0$
* Нормальный вид: $y=f(x,y)$
* Дифференциальная форма: $M(x,y)dx+N(x,y)dy=0$
* Симметрическая форма: $\frac{dx}{X(x,y)}=\frac{dy}{Y(x,y)}$

### Виды записи решения

* Нормальная форма: $y=\gamma(x)$
* Неявная форма: $F(x,y)=0$
* Параметрическая форма: $\begin{cases}
   x=\beta(t)\\\
   y=\alpha(t)
\end{cases}$, $x\in(a,b), t\in(\omega,\eta), a=\beta(\omega), b=\alpha(\eta)$
',
            //'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Что называется обыкновенным дифференциальным уравнением n –го порядка?',
                'a' => [
                    'Соотношение, связывающее независимую переменную, неизвестную функцию и все ее производные до n-го порядка включительно.',
                    'Соотношение, связывающее неизвестную переменную, независимую переменную и все ее производные до n-го порядка включительно.',
                    'Дифференциальное уравнеие n-ой степени.',
                    'Уравнение, содержащее n независимых переменных.',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Как называется процесс решения дифференциального уравнения?',
                'a' => [
                    'Дифференцирование',
                    'Интегрирование',
                    'Построение',
                    'Отождествление'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Что называется порядком дифференциального уравнения?',
                'a' => [
                    'Колличество производных, входящих в уравнение',
                    'Колличество независимых переменных, входящих в уравнение',
                    'Наивысшая степень производной, входящей в уравнение',
                    'Наивысший порядок производной, входящей в уравнение'
                ],
                'c' => [false, false, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Задача Коши',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Задачей Коши называют задачу нахождения решения решения $y=y(x)$ уравнения $y\'=f(x,y)$, удовлетворяющего начальному условию $y(x_0)=y_0$

Геометрически: ищем интегральную кривую, проходящую через заданную точку $M_0$ плоскости $xOy$ 

**Теорема существования и единственности решения задачи Коши.** Пусть дано дифференциальное уравнение $y\'=f(x,y)$, где функция f(x,y) определена в некоторой области D плоскости $xOy$, содержащей точку $(x_0,y_0)$. Если функция f(x,y) удовлетворяет условиям
* $f(x,y)$ есть непрерывная функция двух переменных x и y в области D
* $f(x,y)$ имеет частную производную $\frac{\partial{f}}{\partial{y}}$, ограниченную в области D

то найдется интервал $(x_0-h,x_0+h)$, на котором существует единственное решение $y=\gamma(x)$ данного уравнения, удовлетворяющее условию $y(x_0)=y_0$
',
            'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Выберите условия теоремы существования и единственности решения задачи Коши для функции f(x,y), определенной в оюласти D',
                'a' => [
                    'f(x, y) непрерывна в области D',
                    'f(x, y) ограничена в области D',
                    'f(x, y) монотонно возрастает в области D',
                    'f(x, y) имеет частную производную по y, ограниченную в области D'
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => 'Сколько решений может иметь задача Коши если функция f(x,y) непрерывна и удовлетворяет условию Липшица?',
                'a' => [
                    '0',
                    '1',
                    'Число, равное степени f(x,y)',
                    'Число, равное порядку уравнения'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Какая геометрическая интерпретация задачи Коши?',
                'a' => [
                    'Нахождение наименьшего радиуса окружности с центром в точке (x0, y0) и касающейся одной из интегральных кривых',
                    'Нахождение изоклины, проходящей через заданную точку ($x_0,y_0$)',
                    'Нахождение интегральной кривой, проходящей через заданную точку ($x_0,y_0$)',
                ],
                'c' => [false, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        //Coding theory
        $course = Course::Create([
            'name' => 'Дискретная математика',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'diff_eq.jpeg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Теория кодирования'];
        $blocks = [];

        foreach ($names as $k => $n) {
            $blocks[] = Block::Create([
                'course_id' => $course->id,
                'name' => $n,
                'active' => true,
                'sort' => $k
            ]);
        }

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Основные понятия и определения',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть по двоичному симметричному каналу связи передаются сообщения. Передаваемую информацию необходимо закодировать, для обеспечения ее безопасности, при этом нужно затратить как можно меньше кодовых символов, а также уменьшить влияние помех и шумов в канале передачи, которые влекут повреждение сообщения, превращая его в другое сообщение.

Схема системы связи:
->$\boxed{\text{источник}}\to\boxed{\text{кодер}}\to\underset{\underset{\text{шум}}{\uparrow}}{\boxed{\text{канал}}}\to\boxed{\text{декодер}}\to\boxed{\text{получатель}}$<-

Будем рассматривать кода, состоящие из 0 и 1. Так, при передаче информации, 0 может превратиться в 1, а 1 в 0. Наша задача обнаружить и устранить такие ошибки.

Пусть $E^n$ - n-мерное метрическое пространство всех двоичных векторов длины n с метрикой Хэмминга.

$E^n=\lbrace{(v_1,..,v_n)|a_i\in\lbrace{0,1}\rbrace; 1\leq{i}\leq{n}}\rbrace$

Произвольное подмножество $C\subseteq{E^n}$ пространства $E^n$ называется **двоичным кодом** (блоковым кодом или просто кодом) длины n.

Элементы кода C называются **кодовыми словами**

**Хэммингово расстояние** d(x,y) между векторами $x,y\in{E^n}$ определяется как число координат в которых эти векторы различаются.

**Кодовое расстояние** d кода C равно минимальному расстоянию Хэмминга между различными кодовыми словами

**Вес Хэмминга** $w(x)$ вектора $x\in{E^n}$ равен числу ненулевых координат x, т.е. $w(x) = d(x,0^n)$

Вместо n сообщений будем передавать по каналу связи n кодовых слов, заранеее установив биекцию между сообщениями и кодовыми словами. Затем будем декодирвать кодовые слова, для получения правильных исходных сообщений.

Будем проводить декодирование по **максимуму правдоподобия**: переданным считается кодовое слово,  отличное от принятой последовательности в наименьшем числе координат.

Код, **обнаруживающий ошибки** по принятому слову, определяет где произошла ошибка.

Код, **исправляющий ошибки** по принятому слову, определяет какое слово было передано.

**Теорема.** Для того , чтобы код исправлял любые ошибки веса $w$, минимальное расстояние должно быть не меньше $2*w+1$. Для того чтобы код обнаруживал любые ошибки веса $w$, минимальное расстояние должно быть не меньше $w+1$.

*Доказательство*: Пусть d - минимальное расстояние кода C, s - сфера, радиус которой больше 0 и меньше $w+1$, а центр находится в кодовом слове v. Если $d\geq{w+1}$, то на s нет других кодовых слов. Если же $d\geq{2*w+1}$, то от точек s, расстояние до v меньше расстояния до других кодовых слов. ',
            'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Что такое хэммингово расстояние между векторами $x,y\in{E^n}$',
                'a' => [
                    'Число координат, в которых эти векторы различаются',
                    'Колличество различных линейных комбинаций этих векторов в $E^n$',
                    'Колличество нулевых координат суммы этих векторов',
                    'Число координат, в которых эти векторы не отличаются'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Какое слово считается переданным, если следовать принципу максимума правдоподобия?',
                'a' => [
                    'Кодовое слово с минимальным весом',
                    'Содержащее наибольшее колличество нулей',
                    'Отличное от переданной последовательности в наименьшем числе компонент',
                    'Содержащее наибольшее колличество единиц'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Что называется весом кодового слова?',
                'a' => [
                    'Его длина',
                    'Колличество его ненулевых компонент',
                    'Колличество его нулевых компонент'
                ],
                'c' => [false, true, false]
            ],
            [
                'q' => 'Число двоичных наборов длины n',
                'a' => [
                    'n',
                    '$n^2$',
                    '$n^n$',
                    '$2^n$'
                ],
                'c' => [false, false, false, true],
                'm' => 'На каждое из n мест можем поставить 0 или 1, по правилу произведения колличество таких комбинаций $\underbrace{2*..*2}_{\text{n раз}}=2^n$'
            ],
            [
                'q' => 'Число двоичных наборов длины n веса w',
                'a' => [
                    '$\binom{n}{w}$',
                    '$\frac{n}{w}$',
                    '$n*w$',
                    '$\log[w]{n}$'
                ],
                'c' => [true, false, false, false]
            ]
//            [
//                'q' => '',
//                'a' => [
//                    '',
//                    '',
//                    '',
//                    ''
//                ],
//                'c' => [false, false, false, false]
//            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Линейные коды',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Линейным [n, k]-кодом** длины n называется подмножество пространства $E^n$, являющееся линейным подпространством размерности k в $E^n$.

Пусть в кодер поступило кодовое сообщение $u=(u_1..u_k)$. Сформируем кодовое слово $x=(x_1..x_n)=(u_1..u_kx_{k+1}..x_n)$, где первая часть слова $(x_1..x_k)=(u_1..u_k)$ равна исходному сообщению - информационные символы, а вторая часть слова $(x_{k+1}..x_n)$ : $Hx^t_i=0^{n-k}, i=\overline{k+1,n}$ - проверочные символы.

#### Способы задания линейного [n,k]-кода:
- Кодовая матрица порядка $2^k\times{n}$, строки которой все кодовые слова.
- Порождающая матрица G порядка $k\times{n}$, строки которой кодовые слова, образующие базис линейного кода.
- Проверочная $(n-k, n)$-матрица $H: \forall{x=(x_1..x_n)} Hx=Hx^t=o^{n-k}$(Задает n-k проверочных уравнений)

  **Теорема**. Минимальное кодовое расстояние линейного кода равно минимальному весу его ненулевого слова.
*Доказательство*: Для любых кодовых слов $x,y\in{C}$ число координат в которых они отличаются равно колличиству единиц в слове x+y, поэтому если расстояние между некоторыми x и y равно минимальному расстоянию, то оно равно весу слова $x+y\in{C}$. $\forall x,y\in{C}$ $x-y\in{C}$, поэтому  $d = \min\limits_{x\not={y}}(d(x,y))=\min\limits_{x\not={y}}(w(x-y))=\min\limits_{z\in{C}}(w(z))$

**Порождающая матрица G** - это матрица порядка $k\times{n}$, строками которой являются кодовые слова, образующие базис линейного кода.

**Проверочная матрица H** - это матрица порядка $n-k\times{n}$, такая что для любого кодового слова $x=(x_1..x_n)$ выполняется $Hx^t=0$.

**Теорема о связи проверочной и порождающей матриц.** Если проверочная матрица H линейного кода задана в канонической форме $H=[A_{n-k,k}|E_{n-k}]$, то порождающая матрица G этого кода имеет вид $G=[E_k,A_{n-k,k}]$.

*Доказательство:* Рассмотрим кодовое слово $x=(x_1..x_kx_{k+1}..x_n)$, в котором $(x_1..x_k)$ информационные символы, а остальные символы проверочные. $(x_1..x_k)^t = E_k(u_1..u_k)^t$.

Пусть $A=\begin{pmatrix}
   a_{1,1} & a_{1,2} & ... & a_{1,k} \\
   : & : & .. & :\\
   a_{n-k,1} & a_{n-k,2} & ... & a_{n-k,k}
\end{pmatrix}$

Тогда из определения проверочной матрицы $Hx^t=0$, т.е.  $a_{i,1}x_1+a_{i,2}x_2+...+a_{i,k}x_k+x_{k+i}=0 , i=\overline{1,n-k}$, 
откуда $x_{k+i}=-(a_{i,1}x_1+a_{i,2}x_2+...+a_{i,k}x_k)$

Таким образом $\begin{pmatrix}
   x_{k+1} \\
   : \\
   x_{n}
\end{pmatrix}=-A_{n-k,k}\begin{pmatrix}
   x_1 \\
   :\\
   x_k
\end{pmatrix}=-A_{n-k,k}\begin{pmatrix}
   u_1 \\
   :\\
   u_k
\end{pmatrix}$

Получаем $x^t=\begin{pmatrix}
   E_k \\
   :\\
   -A_{n-k,k}
\end{pmatrix}u^t$

Тогда $x=u(E_k|-A_{n-k,k}^t)=uG$

**Теорема о столбцах проверочной матрицы.** Код длины n имеет кодовое расстояние d тогда и только тогда, когда любые d-1 столбцов его проверочной матрицы H линейно независимы и найдутся d линейно зависимых столбцов.

*Доказательство:* 

Необходимость: Пусть x вектор веса w. Ясто что $x\in{C}\iff{Hx^t=0}$, что эквивалентно линейной зависимости некоторых w столбцов матрицы H. Обозначим $i$-й столбец матрицы H через $h_i$, т.e. $H=[h_1..h_n]$ Отсюда и из равенства $Hx^t=0$ получаем $\displaystyle\sum_{i=1}^n{h_ix_i}=0$, откуда следует соотношение $h_{i_1}+..+h_{i_w}=0$. Т.к. $d=\min\limits_{x\in{C}, x\not={0}}(w(x))$, получаем линейную зависимость некоторой совокупности d столбцов матрицы H.  

Достаточность очевидна.

## Примеры

1) (5, 2)-код задан порождающей матрицей $G=\begin{pmatrix}
   1 & 0 & 0 & 1 & 0 \\
   1 & 1 & 1 & 0 & 1
\end{pmatrix}$. Найти его проверочную матрицу H, множество кодовых слов C, кодовое расстояние d.

Составим всевозможные линейные комбинации порождающих векторов $g_1=(10010)$ $g_2=(11101)$ - строк матрицы G и получим множество кодовых слов C. $\forall{x\in{C}}\space{x=\alpha_1g_1+\alpha_2g_2}, \alpha_{1,2}\in{\lbrace0,1\rbrace}$, $\lvert{C}\rvert=2^2$

$C={\lbrace(00000),(10010),(11101),(01111)\rbrace}$

Минимальное кодовое расстояние $d=\min\limits_{x\in{C}}(w(x))=2$

В коде $C$ 4 кодовых слова, поэтому можно закодировать 4 сообщения.

Закодируем сообщение u=$(01)$

$u*G=(01)*\begin{pmatrix}
   1 & 0 & 0 & 1 & 0 \\
   1 & 1 & 1 & 0 & 1
\end{pmatrix}=(01101)$

Найдем проверочную (2,5)-матрицу H, используя условие $H*G^t=0$

$(x_1x_2x_3x_4x_5)*\begin{pmatrix}
   1 & 1 \\
   0 & 1 \\
   0 & 1 \\
   1 & 0 \\
   0 & 1
\end{pmatrix}=0$

Решим систему линейных уравнений, с $5-2=3$ свободными переменными.
$\begin{cases}
   x_1+x_4=0  \\
   x_1+x_2+x_3+x_5=0
\end{cases}\begin{cases}
   x_4=x_2+x_3+x_5  \\
   x_1=x_2+x_3+x_5
\end{cases}$

$(x_2+x_3+x_5,x_2,x_3,x_2+x_3+x_5,x_5)=x_2(11010)+x_3(10110)+x_5(10011)$

$H=\begin{pmatrix}
   1 & 1 & 0 & 1 & 0 \\
   1 & 0 & 1 & 1 & 0 \\
   1 & 0 & 0 & 1 & 1
\end{pmatrix}$
',
            //'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Какой код является линейным?',
                'a' => [
                    'Код, множество кодовых слов которого является подпространством в $E^n$.',
                    'Такой, что для любого кодового слова $(x_1..x_n)$ слово $(x_2..x_{n}x_1)$, также является кодовым.',
                    'Содержащий n линейно независимых кодовых слов.',
                    'Код, для которого минимальное расстояние Хэмминга равно 3'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Если размерность порождающей матрицы линейного кода равна $2^k\times{n}$, то размерность его проверочной матрицы равна',
                'a' => [
                    '$2^{n-k}\times{n}$',
                    '$2^n\times{k}$',
                    '$n\times{2^k}$',
                    '$n\times{2^{n-k}}$'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Свойства порождающей матрицы G линейного [n,k,d]-кода С',
                'a' => [
                    'Ее строками являются k линейно независимых векторов пространства $E^n$',
                    'Ее строками являются n линейно независимых векторов пространства $E^n$',
                    'Все кодовые слова кода С являются всевозможными линейными комбинациями ее строк',
                    'Матрица G порождает линейное пространство'
                ],
                'c' => [true, false, true, true]
            ],
            [
                'q' => 'Чему равно минимальное кодовое расстояние линейного [n,k]-кода С, если минимальный вес его ненулевого кодового слова равен w',
                'a' => [
                    '$\frac{2*w}{k}$',
                    '$\frac{2^w}{k}$',
                    '$\frac{n}{w}$',
                    '$w$'
                ],
                'c' => [false, false, false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Коды Хэмминга',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Двоичным **(n, k)-кодом Хэмминга** является код, заданный проверочной матрицей H, столбцами которой являютя все ненулевые векторы длины $m=\log_2{n}$

Пример (7, 4)-кода Хэмминга:

$\begin{pmatrix}
   0 & 1 & 0 & 1 & 1 & 1 & 0 \\
   0 & 1 & 1 & 1 & 0 & 0 & 1 \\
   1 & 1 & 1 & 0 & 1 & 0 & 0
\end{pmatrix}$

Удобно записывать проверочную матрицу кода Хэмминга, располагая ее столбцы в натуральном порядке, т.е. i-й столбец равен двоичному представлению числа i.

Рассмотрим пример (7, 4)-кода Хэмминга, со столбцами расположенными в натуральном порядке.

$\begin{pmatrix}
   0 & 0 & 0 & 1 & 1 & 1 & 1 \\
   0 & 1 & 1 & 0 & 0 & 1 & 1 \\
   1 & 0 & 1 & 0 & 1 & 0 & 1
\end{pmatrix}$

Очевидно, что любые два столбца матрицы H линейно независимы и найдутся три линейно зависимых столбца, следовательно по теореме о столбцах проверочной матрицы кодовое расстояние равно 3 и значит код исправляет одну ошибку

Пусть столбцы проверочной матрицы H кода Хэмминга расположены в натуральном порядке. Тогда справедлива
**Теорема.** Если произошла ошибка в i-м символе, то синдром S равен двоичному предствлению числа i.',
            'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Сколько ошибок исправляет код Хэмминга длины 7?',
                'a' => [
                    '3',
                    '7',
                    '1',
                    '0'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [false, false, false, false]
            ],
            [
                'q' => 'Минимальное расстояние кода Хэмминга равно',
                'a' => [
                    '4',
                    '3',
                    '2',
                    '1'
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Декодирование линейных кодов.',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '',
            //'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '3',
                    '7',
                    '1',
                    '0'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [false, false, false, false]
            ],
            [
                'q' => '',
                'a' => [
                    '4',
                    '3',
                    '2',
                    '1'
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);
    }

    private function create_questions($lesson, $questions)
    {
        foreach ($questions as $i => $q) {
            $qc = $lesson->questions()->create([
                'text' => $q['q'],
                'type' => 'test',
                'answer' => json_encode(array_map(function ($a, $c) {
                    return [
                        'text' => $a,
                        'correct' => $c
                    ];
                }, $q['a'], $q['c'])),
                'points' => 5,
                'sort' => $i,
                'active' => true,
                'lesson_id' => $lesson->id
            ]);
            if (array_has($q, 'm')) {
                $qc->comment = $q['m'];
                $qc->save();
            }
        }


    }
}
