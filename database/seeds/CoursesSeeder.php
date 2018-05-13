<?php

use App\Block;
use App\Category;
use App\Course;
use App\Lesson;
use Illuminate\Database\Seeder;

//use CoursesCreate;


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
            'name' => 'Алгебра',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'algebra.jpg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Комплексные числа', 'Группы', 'Кольца', 'Поля'];
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
            'name' => 'Понятие и представление комплексного числа',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '### Понятие комплексного числа.

**Комплексным числом** $z$ называется выражение вида $z=x+iy,\space{}x,y\in{R},\space{i}=\sqrt{-1},\space{i}^2=-1,\space{i}$ - мнимая единица.

$x=Re(z)$ - действительная часть комплексного числа.
$y=Im(z)$ - мнимая часть комплексного числа.

Если $x=0$, то число $z=0+iy=iy$, называется чисто мнимым.
Если $y=0$, то число $z=x+i*0=x$, называется действительным.

$C=\lbrace{x+iy|x,y\in{R},\space{i}=\sqrt{-1}}\rbrace$ - поле комплексных чисел.

Пусть $z_1=x_1+iy_1$ и $z_2=x_2+iy_2$ - комплексные числа, тогда:

1) $z_1=z_2\iff{}Re(z_1)=Re(z_2)\And{}Im(z_1)=Im(z_2)$.
2) $z_1=0\iff{}Re(z_1)=Im(z_1)=0$.

Два комплексных числа $z=x+iy$ и $\overline{z}=x-iy$, отличающиеся только знаком мнимой части называют **сопряженными**.

Комплексное число $z=x+iy$ можно изобразить на плоскости $xOy$ точкой $M(x,y)$ и наоборот каждой точке $M(x,y)$ плоскости $xOy$ соответствует комплексное число $z=x+iy$. Плоскость, на которой изображаются комплексные числа называется **комплексной плоскостью**.

Точкам, лежащим на ось $Ox$ соответствуют действительные числа, на $Oy$ - мнимые числа. $Ox$ - действительная ось. $Oy$ - мнимая ось.

### Формы записи комплексного числа.

1) Алгебраическая $z=x+iy$.
2) Тригонометрическая $z=r(cos\varphi+isin\varphi)$
3) Показательная $z=re^{i\varphi}$, $e^{i\varphi}=cos\varphi+isin\varphi$ (формула Эйлера)
  
### Тригонометрическое представление комплексного числа.
Длина вектора $\overrightarrow{OM}$ называется **модулем** комплексного числа и обозначается $|z|=r=\sqrt{x^2+y^2}$

Угол между вектором $\overrightarrow{OM}$ и положительным направлением оси $Ox$ называется **аргументом** комплексного числа и обозначается $Arg(z)$ или $\varphi$.
  
Выразимм из прямоугольного треугольника координаты точки $M(x,y)$ через модуль и аргумент комплексного числа.

$sin(\varphi)=\frac{y}{r}\implies{y}=r\sin(\varphi)$
$cos(\varphi)=\frac{x}{r}\implies{x}=r\cos(\varphi)$

Тогда $z=x+iy=rcos(\varphi)+irsin(\varphi)=r(cos(\varphi)+isin(\varphi)),\space{r}=\sqrt{x^2+y^2}$

$Arg(z)$ определяется с точностью до слагаемого $2\pi{k},k\in{Z}:\space{Arg(z)}=arg(z)+2\pi{k}$, где $arg(z)$ - главное значение аргумента, $arg(z)\in{(-\pi,\pi]\lor{[0,2\pi)}}$

  ->$arg(z)=\begin{cases}\arctg\frac{y}{x},z\in{1,4}\space\text{четверти}\\\pi+\arctg\frac{y}{x},z\in{2}\space\text{четверти}\\\-\pi+\arctg\frac{y}{x},z\in{3}\space\text{четверти}\end{cases}$<-
',
            'examples' => ''
        ]);

        $questions = [
            [
                'q' => 'Формы записи комплексного числа',
                'a' => [
                    'Тригонометрическая',
                    'Геометрическая',
                    'Изометрическая',
                    'Логическая',
                    'Алгебраическая',
                    'Показательная'
                ],
                'c' => [true, false, false, false, true, true]
            ],
            [
                'q' => 'В какой форме записано комплексное число $z=x+iy$',
                't' => 'test_one',
                'a' => [
                    'Тригонометрическая',
                    'Алгебраическая',
                    'Показательная'
                ],
                'c' => [false, true, false]
            ],
            [
                'q' => 'В какой форме записано комплексное число $z=re^{i\varphi}$',
                't' => 'test_one',
                'a' => [
                    'Тригонометрическая',
                    'Алгебраическая',
                    'Показательная'
                ],
                'c' => [false, false, true]
            ],
            [
                'q' => 'В какой форме записано комплексное число $z=r(\cos(\varphi)+isin(\varphi))$',
                't' => 'test_one',
                'a' => [
                    'Тригонометрическая',
                    'Алгебраическая',
                    'Показательная'
                ],
                'c' => [true, false, false]
            ],
            [
                'q' => 'Чему равна действительная часть комплексного числа $z=5+6*i$',
                't' => 'test_one',
                'a' => [
                    '5',
                    '-5',
                    '6',
                    '-6',
                    '$6*i$',
                    '$-6*i$'
                ],
                'c' => [true, false, false, false, false, false]
            ],
            [
                'q' => 'Чему равна мнимая часть комплексного числа $z=5+6*i$',
                't' => 'test_one',
                'a' => [
                    '5',
                    '-5',
                    '6',
                    '-6',
                    '$6*i$',
                    '$-6*i$'
                ],
                'c' => [false, false, true, false, false, false]
            ],
            [
                'q' => 'Чему равна действительная часть комплексного числа $z=2(cos(-\frac{5\pi}{6})+isin(-\frac{5\pi}{6}))$',
                't' => 'test_one',
                'a' => [
                    '1',
                    '-1',
                    '$\sqrt{3}$',
                    '$-\sqrt{3}$'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Чему равна мнимая часть комплексного числа $z=2(cos(-\frac{5\pi}{6})+isin(-\frac{5\pi}{6}))$',
                't' => 'test_one',
                'a' => [
                    '1',
                    '-1',
                    '$\sqrt{3}$',
                    '$-\sqrt{3}$'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Найдите модуль комплексного числа $z=-\sqrt{35}-i$',
                'a' => '6',
                't' => 'task'
            ],
            [
                'q' => 'Найдите модуль комплексного числа $z=4(\cos(\frac{\pi}{2})+i\sin(\frac{\pi}{2}))$',
                'a' => '4',
                't' => 'task'
            ],
            [
                'q' => 'Найдите алгебраическое представление комплексного числа $z=4(\cos(\frac{\pi}{2})+i\sin(\frac{\pi}{2}))$',
                'a' => '4i',
                't' => 'task'
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Действия над комплексными числами',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть $z_1=x_1+iy_1$ и $z_2=x_2+iy_2$ - комплексные числа, определим алгебраические операции, справедливые для этих чисел.

### Сложение

$z_1+z_2=(x_1+iy_1)+(x_2+iy_2)=(x_1+x_2)+i(y_1+y_2)$

### Вычитание

$z_1-z_2=(x_1+iy_1)-(x_2+iy_2)=(x_1-x_2)+i(y_1-y_2)$

Заметим, что модуль разности $z_1$ и $z_2$ $d=|z_1-z_2|=\sqrt{(x_1-x_2)^2+(y_1-y_2)^2}$ есть расстояние между точками $z_1$ и $z_2$.

### Умножение

1) В алгебраической форме:
	$z_1z_2=(x_1+iy_1)(x_2+iy_2)=x_1x_2+ix_1y_2+iy_1x_2-y_1y_2=(x_1x_2-y_1y_2)+i(x_1y_2+y_1x_2)$
2) В тригонометрической форме:
<br/>
	->$\begin{aligned}z_1z_2=&r_1(\cos(\varphi_1)+isin(\varphi_1))r_2(\cos(\varphi_2)+isin(\varphi_2))\\\=&r_1r_2(\cos(\varphi_1)\cos(\varphi_2)+i\cos(\varphi_1)\sin(\varphi_2)+i\cos(\varphi_2)\sin(\varphi_1)-\sin(\varphi_1)\sin(\varphi_2))\\\=&r_1r_2((\cos(\varphi_1)\cos(\varphi_2)-\sin(\varphi_1)\sin(\varphi_2))+i(\cos(\varphi_1)\sin(\varphi_2)+\cos(\varphi_2)\sin(\varphi_1))\\\=&r_1r_2(\cos(\varphi_1+\varphi_2)+i\sin(\varphi_1+\varphi_2))\end{aligned}$<-
  
### Деление

1) В алгебраической форме:

$\frac{z_1}{z_2}=\frac{x_1+iy_1}{x_2+iy_2}=\frac{(x_1+iy_1)(x_2-iy_2)}{(x_2+iy_2)(x_2-iy_2)}=\frac{(x_1x_2+y_1y_2)+i(y_1x_2-x_1y_2)}{x_2^2+y_2^2}=\frac{x_1x_2+y_1y_2}{x_2^2+y_2^2}+i\frac{y_1x_2-x_1y_2}{x_2^2+y_2^2}$

2) В тригонометрической форме:

$\frac{z_1}{z_2}=\frac{r_1(\cos(\varphi_1)+isin(\varphi_1))}{r_2(\cos(\varphi_2)+isin(\varphi_2))}=\frac{r_1(\cos(\varphi_1)+isin(\varphi_1))(\cos(\varphi_2)-isin(\varphi_2))}{r_2(\cos(\varphi_2)+isin(\varphi_2))(\cos(\varphi_2)-isin(\varphi_2))}=\frac{\cos(\varphi_1-\varphi_2)+i\sin(\varphi_1-\varphi_2)}{r_2(\cos^2(\varphi_2)+\sin^2(\varphi_2))}=\frac{r_1}{r_2}(\cos(\varphi_1-\varphi_2)+i\sin(\varphi_1-\varphi_2))$

### Возведение в целую степень

$z^n=r^n(\cos(n\varphi)+i\sin(n\varphi))$ - формула Муавра

*Доказательство:* индукция по n
1) База: при n=2, получаем верное тождество.
2) Шаг: Пусть равенство справедливо для n-1, покажем что оно справедливо для n,

->$\begin{aligned}z^n\\\&=z^{n-1}z\\\&=r^{n-1}(\cos((n-1)\varphi)+i\sin((n-1)\varphi))r(\cos(\varphi)+i\sin(\varphi))\\\&=r^{n-1+1}(\cos(n\varphi+\varphi)+i\sin(n\varphi+\varphi))\\\&=r^n(\cos(n\varphi)+i\sin(n\varphi))\end{aligned}$<-

### Извлечение корня

$\sqrt[n]{z}=\sqrt[n]{\cos(\varphi)+i\sin(\varphi)}=\sqrt[n]{r}(\cos(\frac{\varphi+2\pi{k}}{n})+i\sin(\frac{\varphi+2\pi{k}}{n})),\space{k}=\overline{0,n-1}$

*Доказательство:*
Пусть $\sqrt[n]{z}=w$, тогда $z=w^n$

Пусть $z=r(\cos(\varphi)+i\sin(\varphi)),\space{w}=t(\cos(\psi)+i\sin(\psi))$, тогда

$r(\cos(\varphi)+i\sin(\varphi))=t^n(\cos(n\psi)+i\sin(n\psi))$, 

$\begin{cases}t^n=r\\\n\psi=\varphi+2\pi{k},k\in{Z}\end{cases},\space\begin{cases}t=\sqrt[n]{r}\\\psi=\frac{\varphi+2\pi{k}}{n}\end{cases}$, 

Таким образом $\sqrt[n]{z}=\sqrt[n]{r}(\cos(\frac{\varphi+2\pi{k}}{n})+i\sin(\frac{\varphi+2\pi{k}}{n})),\space{k}=\overline{0,n-1}$

$k=\overline{0,n-1}$, так как дальше корни будут повторяться: $k=n\implies arg(\sqrt[n]{z})=\frac{\varphi+2\pi{n}}{n}=\frac{\varphi}{n}+2\pi$, но это эквивалентно тому что $k=0$, так как период функций $cos(x)$ и $sin(x)$ равен $2\pi$.

### Сопряжение

Два комплексных числа $z=x+iy$ и $\overline{z}=x-iy$, отличающиеся только знаком мнимой части называют **сопряженными**.

**Свойства операции сопряжения:**

1. $\overline{z_1+z_2}=\overline{(x_1+x_2)+i(y_1+y_2)}=(x_1+x_2)-i(y_1+y_2)=(x_1-iy_1)+(x_2-iy_2)=\overline{z_1}+\overline{z_2}$

2. $\overline{z_1z_2}=\overline{(x_1x_2-y_1y_2)+i(x_1y_2+y_1x_2)}=(x_1x_2-y_1y_2)-i(x_1y_2+y_1x_2)=(x_1-iy_1)(x_2-iy_2)=\overline{z_1}\space\overline{z_2}$

3. Если $z=a+ib, b=0$, то $\overline{z}=z$. Отображение $f: R\to{C}: f(x)=x+0*i$, задаёт изоморфное вложение $R$ в $C$

4. Пусть $f(x)\in{R}[x]$, тогда $f(\overline{z})=\overline{f(z)}$
	 
	->$f(x)=a_nx^n+..+a_1x+a_0,\space{a}_i\in{R},i=\overline{0,n}$<br/>
  $\begin{aligned}&f(\overline{z})\\\&=a_n\overline{z^n}+..+a_1\overline{z}+a_0\\\&=\lbrace{\overline{a_i}=a_j}\rbrace\\\&=\overline{a_n}\space\overline{z^n}+..+\overline{a_1}\space\overline{z}+\overline{a_0}\\\&=\overline{a_nz^n}+..+\overline{a_1z}+a_0\\\&=\overline{a_nz^n+..+a_1z+a_0}\\\&=\overline{f(z)}\end{aligned}$<-
  
5. Если $z=a+ib$ - корень многочлена $f(x)\in{R[x]}$, то $\overline{z}=a-ib$, также корень $f(x)$.
	<br/>$f(\overline{z})=\overline{f(z)}=\overline{0}=0$'
        ]);

        $questions = [
            [
                'q' => 'Найдите координаты точки $M(x,y)$ плоскости $xOy$, соответствующей комплексному числу $w=z_1+z_2$, если $z_1=5+6i,\space{z}_2=7+2i$ (ответ запишите в виде $x,y$)',
                't' => 'task',
                'a' => '12,8'
            ],
            [
                'q' => 'Найдите координаты точки $M(x,y)$ плоскости $xOy$, соответствующей комплексному числу $w=z_1-z_2$, если $z_1=5+6i,\space{z}_2=7+2i$ (ответ запишите в виде $x,y$)',
                't' => 'task',
                'a' => '-2,4'
            ],
            [
                'q' => 'Найдите координаты точки $M(x,y)$ плоскости $xOy$, соответствующей комплексному числу $w=z_1z_2$, если $z_1=5+6i,\space{z}_2=7+2i$ (ответ запишите в виде $x,y$)',
                't' => 'task',
                'a' => '23,52'
            ],
            [
                'q' => 'Найдите координаты точки $M(x,y)$ плоскости $xOy$, соответствующей комплексному числу $w=\frac{z_1}{z_2}$, если $z_1=5+10i,\space{z}_2=1+5i$ (ответ запишите в виде $x,y$)',
                't' => 'task',
                'a' => '11,7'
            ],
            [
                'q' => 'Найдите координаты точки $M(x,y)$ плоскости $xOy$, соответствующей комплексному числу $w=z^5$, если $z=2(\cos(\frac{\pi}{10})+i\sin(\frac{\pi}{10}))$ (ответ запишите в виде $x,y$)',
                't' => 'task',
                'a' => '0,32'
            ],
            [
                'q' => 'Найдите координаты точек $M(x,y)$ плоскости $xOy$, соответствующей комплексным числам $w=\sqrt[4]{z}$, если $z=4(cos(\pi)+i\sin(\pi))$ (ответ запишите в виде $x,y$ для $k=0$)',
                't' => 'task',
                'a' => '1,1'
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Поле комплексных чисел',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => ''
        ]);

        $questions = [

        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Корни n-й степени из единицы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Рассмотрим множество $C_n=\lbrace{z|z^n=1}\rbrace$

**Теорема**. $C_n$ - группа, относительно операции умножения.
*Доказательство:* 
1) $z_1,z_2\in{C}_n$, тогда $(z_1z_2)^n=z_1^nz_2^n=1*1=1\implies{}z_1z_2\in{C_n}$, т.е. $C_n$ замкнуто относительно умножения.
2) $1^n=1\in{C_n}$ - нейтральный элемент.
3)  Умножение комплекснх чисел ассоциативно.
4) $(z^{-1})^n=(z^n)^{-1}=1^{-1}=1$, т.е. $\forall{z}\in{C_n}\space\exists{z^{-1}}\in{C_n}$ - обратный элемент.

**Утверждение**. $|C_n|=n$.

*Доказательство:* 

Если $z\in{C_n}$, то по т.Безу $(x-z)|(x^n-1)\implies{x^n-1}=\displaystyle\prod_{z\in{C_n}}{(x-z)}$.
$deg(x^n-1)=n\implies$ справа $n$ множителей  $\implies\space|C_n|=n\qquad\checkmark$

Если $z\in{C_n},O(z)=m,$ то по т.Лагранжа $m|n$

$z\in{C_n}\implies{z}^n=1$, тогда $(z^m)^n=z^{mn}=(z^n)^m=1^m=1$

Тогда: $x^n-1=\displaystyle\prod_{z\in{C_n}}{(x-z)}=\displaystyle\prod_{d|n}{(\varphi_d(x))}, \varphi_d(x)=\displaystyle\prod_{d=O(z)}{(x-z)}$


$\sqrt[n]{1}=\sqrt[n]{1+0i}=\sqrt[n]{\cos(0)+i\sin(0)}=\cos(\frac{0+2\pi{k}}{n})+i\sin(\frac{0+2\pi{k}}{n}),k=\overline{0,n-1}$

Найдем расстояние от $\sqrt[n]{1}$ до начала координат.

$|\sqrt[n]{1}|=\sqrt{\cos^2(\varphi)+\sin^2(\varphi)}=1$, значит все корни $n$-й степени из 1 лежат на единичной окружности с центром в начале кординат.

$z=\sqrt[n]{1}\implies\overline{z}=\sqrt[n]{1}\implies$ все корни n-й степени из 1 вершины правильного n-угольника, вписанного в единичную окружность, одна из вершин которого в точке $(1,0)$, т.к. $1^n=1$

Пусть $\varepsilon=\cos(\frac{2\pi}{n})+i\sin(\frac{2\pi}{n})$, тогда $C_n=\lbrace{1,\varepsilon,\varepsilon^2,..,\varepsilon^{n-1}}\rbrace,\space\varepsilon^n=1$

Корень $t\in{C_n}$ называется **первообразным**, если $O(t)=n$. Следовательно $C_n=\lbrace{t^k|k=\overline{0,n-1}}\rbrace$.

**Утверждение**. $\varepsilon^m$ - первообразный корень n-й степени из 1 $\iff$ $n$ и $m$ - взаимно просты.

*Доказательство:* 
 $\implies:\space{}m=ak,n=bk,(a,b)=1$, тогда $(\varepsilon^{m})^b=(\varepsilon^{ak})^b=(\varepsilon^{bk})^a=(\varepsilon^n)^a=1^a=1\implies{O(\varepsilon^m)}=b\qquad\checkmark$
 $\impliedby:(m,n)=1\implies(\varepsilon^m)^n=(\varepsilon^n)^m=1^m=1\implies{O(\varepsilon^m)}=n$

**Утверждение**. Число первообразных корней n-й степени из 1 есть $\varphi(n)$, где $\varphi(n)$ - функция Эйлера.

*Доказательство:* '
        ]);

        $questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => []
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Функции комплексного переменного',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '### Функци комплексного переменного.

Говорят, что на множестве $W\in{C}$ задана функция $w=f(z)$, если задано правило, по которому каждой точке $z\in{W}$ ставится в соответствие определенная точка $w\in{C}$ (в таком случае функция называется однозначной) либо совокупность точек $w\in{C}$ (в этом случае функция называется многозначной).

✔︎ $w=\overline{z},w=Re(z),w=Im(z)$ - однозначные функции
✔︎ $w=Arg(z)=arg(z)+2\pi{k},k\in{Z}$ - многозначная функция.

Если $z=x+iy,w=u+iv$, то задание функции $w=f(z)=f(x+iy)$ эквивалентно заданию двух действительных функций $u(x,y),v(x,y)$, так как $w=f(z)=f(x+iy)=u(x,y)+iv(x,y)$.

Если отображение $w=f(z),z\in{W}$, является взаимно-однозначным, то $f(z)$ называется **однолистной**. Если область определения функции $W$ можно разбить на несколько областей однолистности, то $f(z)$ называется **многолистной**.

### Элементарные функции комплексного переменного.

✦ **Линейная функция** $w=az+b,a,b\in{C},a\not=0,z\in{C}$.

**Утверждение**. Линейная функция является однолистой
$\blacktriangleright$  Очевидно, что линейная функция однозначна. Обратная к ней $z=\frac{1}{a}w-\frac{b}{a}$, также однозначна. Значит функция $w=az+b,a,b\in{C}$ является однолистной.

Рассмотрим функцию $t=az$. 

Так как $t=|a||z|(\cos(arg(a)+arg(z))+i\sin(arg(a)+arg(z))$, то $|t|=|a||z|,arg(t)=arg(a)+arg(z)$.

**Геометрический смысл** отображения $t=az$: $C$ растягивается в $|a|$ раз и поворачивается вокруг точки $z=0$ на угол $arg(a)$. А функция $f(z)=t+b$ сдвигает плоскость $t$ на вектор $b$. Таким образом линейная функция $w=az+b$ растягивает, поворачивает и сдвигает комплексную плоскость $C$.

✦ **Показательная функция** $w=e^z,z\in{C}$.

По определению  $e^z=e^x(\cos(y)+i\sin(y))\space\forall{z}=x+iy$.

При $x=0:\space{e}^{iy}=\cos(y)+i\sin(y)$ - формула Эйлера.

Любое комплексное число можно записать в виде $z=re^i\varphi$, где $r=|z|,\varphi=Arg(z)$ (Здесь используется формула Эйлера: $e^{i\varphi]=\cos(\varphi)+i\sin(\varphi)$)

**Свойства:**
1) При $y=0\quad{}e^z=e^x$.
2) $e^{z_1}e^{z_2}=e^{z_1+z_2}$
	$\begin{aligned}\blacktriangleright\quad{e}^{z_1}e^{z_2}\\\&=e^{x_1}(\cos(y_1)+i\sin(y_1))e^{x_2}(\cos(y_2)+i\sin(y_2))\\\&=e^{x_1+x_2}(\cos(y_1+y_2)+i\sin(y_1+y_2))\\\&=e^{z_1+z_2}\end{aligned}$.
3) $e^z$ - периодическая функция с периодом $T=2\pi{i}$.
	$\blacktriangleright\qquad{e}^{z+2\pi{i}}=e^x(\cos(y+2\pi)+i\sin(y+2\pi))=e^x(\cos(y)+i\sin(y))=e^z$
  
✦ **Тригонометрические функции** $w=sin(z),w=cos(z),z\in{C}$.

По определению: $\sin(z)=\frac{e^{iz}-e^{-iz}}{2i},\space\cos(z)=\frac{e^{iz}+e^{-iz}}{2}$

**Свойства:**

1) $y=0\implies{}sin(z)=sin(x),cos(z)=cos(x)$
	$\blacktriangleright\quad\sin(z)=\frac{cos(x)+isin(x)-(cos(x)-isin(x))}{2i}=sin(x)$ 
  $\qquad\cos(z)=\frac{cos(x)+isin(x)+(cos(x)-isin(x))}{2i}=cos(x)$
   
2) $sin(z),cos(z)$ - периодические функции с периодом $T=2\pi$.
	$\blacktriangleright\quad\sin(z+2\pi)=\frac{e^{i(z+2\pi)}-e^{-i(z+2\pi)}}{2i}=\frac{e^{iz}-e^{-iz}}{2i}$
  $\qquad\cos(z+2\pi)=\frac{e^{i(z+2\pi)}+e^{-i(z+2\pi)}}{2}=\frac{e^{iz}+e^{-iz}}{2}$
3) $\sin(z)$ - нечетная функция, $\cos(z)$ - четная функция.
	$\blacktriangleright\quad\sin(-z)=\frac{e^{-iz}-e^{iz}}{2i}=-sin(z)$
  $\qquad\cos(-z)=\frac{e^{-iz}+e^{iz}}{2}=cos(z)$

★ Для $sin(z),cos(z)$ справедливы все обычные тригонометрические соотношения : $sin^2(z)+cos^2(z)=1,sin(2z)=2sin(z)cos(z)$ и т.д.

★ Из определения $sin(z),cos(z)$ следует формула Эйлера: $e^{iz}=\cos(z)+i\sin(z)$

✦ **Логарифмическая функция** $w=Ln(z)$.

$Ln(z)$ определяется как обратная функция к функции $e^{iz}$

Так как $e^{iz}\not=0$, а любое другое значение $e^{iz}$ принимает в бесконечном множестве точек, то $Ln(z)$  является бесконечнозначной функцией, определенной на всей комплексной плоскости, за исключением $z=0$.

Рассмотрим уравнение $e^w=z$, относительно $w$. Положим $w=a+ib,z=re^{i\varphi},r>0$.
Тогда $e^{a+ib}=re^{i\varphi}\iff{e}^{a+ib}=e^{\ln(r)+i\varphi}\iff{a+ib}=\ln(r)+i\varphi\iff{a}=\ln(r),b=\varphi+2\pi{k},k\in{Z}$

Таким образом $Ln(z)=ln|z|+iArg(z),|z|=r,\varphi+2\pi{k}=Arg(z)$.

**Свойства:**

1) $Ln(z_1z_2)=Ln(z_1)+Ln(z_2).$
	$\blacktriangleright\quad{}Ln(z_1z_2)=ln|z_1z_2|+iArg(z_1z_2)=ln|z_1|+ln|z_2|+i(Arg(z_1)+Arg(z_2))=Ln(z_1)+Ln(z_2)$ 
2) $Ln(\frac{z_1}{z_2})=Ln(z_1)-Ln(z_2)$
	$\blacktriangleright\quad{}Ln(\frac{z_1}{z_2})=ln|\frac{z_1}{z_2}|+iArg(\frac{z_1}{z_2})=ln|z_1|-ln|z_2|+i(Arg(z_1)-Arg(z_2))=Ln(z_1)-Ln(z_2)$ 

✦ **Степенная функция** $w=z^n$.

Если $n\in{N}$, то $z^n=\underbrace{z...z}_{\text{n раз}},z\in{C}$.

Ясно, что $|z^n|=|z|^n,Arg(z^n)=nArg(z),$ и что функция $w=z^n$ однозначна.

Пусть $\alpha\in{C}$ - произвольное комплексное число, тогда $z^\alpha=e^{\alpha{}Ln(z)}$ 

Так как $Ln(z)$ - бесконечнозначная функция, то $z^\alpha$, также бесконечнозначная функция.

✦ **Гиперболические функции** $sh(z),ch(z),th(z),cth(z)$.

$sh(z)=\frac{e^z-e^{-z}}{2},ch(z)=\frac{e^z+e^{-z}}{2},th(z)=\frac{sh(z)}{ch(z)},cth(z)=\frac{ch(z)}{sh(z)}$

'
        ]);

        $questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => []
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Понятие группы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Группа** - множество $G=<G,*>$  с операцией умножения, обладающей следующими свойствами:
1) Ассоциативность. $a(bc)=(ab)c\space\forall{}a,b,c\in{G}$.
2) Наличие нейтрального элемента. $\exists{e}\in{G}:ae=ea=a\space\forall{a}\in{G}$
3) Наличие нобратного элемента. $\forall\space{a}\in{G}\space\exists\space{a^{-1}}\in{G}:aa^{-1}=a^{-1}a=e$.

Группа $G$ называется **абелевой** (**коммутативной**), если $\forall\space{a,b}\in{G}\space{}ab=ba$

**Мультиплекативная запись группы** $<G,*>$ : операция - умножение, нейтральный - 1, обранный к $g\in{G}$ есть $g^{-1}$.

**Аддитивная запись группы** $<G,+>$ : операция - сложение, нейтральный - 0, обратный называют противоположным и для $g\in{G}$ это $-g$.

Группа, содержащая конечное число элементов называется **конечной**. В противном случае - **бесконечной**.

Пусть $<{G,*}>$ - группа, тогда
1) В $G$ существует единственная единица.
	$\blacktriangleright$ если $e_1,e_2$ - нейтральные, то $e_1=e_1e_2=e_2$
2) $\forall{g}\in{G}\space\exists!\space{g}^{-1}\in{G}$ (Существует единственный обратный элемент).
	$\blacktriangleright$ если $g_1,g_2\in{G}$ - обратные к $g\in{G}$, то $g_1g=e,g_2g=e\implies{g_1=g_2=eg^{-1}}$
3) В $G$ однозначно разрешимы уравнения $ax=b$ и $xa=b\space\forall{a,b}\in{G}$, а именно $x=a^{-1}b$ и $x=b{a^-1}$ соответственно. (Так, в строках и столбцах таблицы Кели все значения различны).
	$\blacktriangleright\enspace{ax}=b\iff{a^{-1}}ax=a^{-1}b\iff{ax=b}$
  $\qquad{xa=b}\iff{xaa^{-1}}=ba^{-1}\iff{x=ba^{-1}}$
4) Законы сокращения: $ab=ac\iff{b=c},\space{}ac=bc\iff{a=b}$
	$\blacktriangleright\enspace{ab=ac\iff}a^{-1}(ab)=a^{-1}(ac)\iff{(a^{-1}a)b=(a^{-1}a)c\iff{b=c}}$
  $\qquad{ac=bc\iff}(ac)c^{-1}=(bc)c^{-1}\iff{a(cc^{-1})=b(cc^{-1})\iff{a=b}}$
5) В $G$ справедлив обобщенный закон ассоциативности, а если $G$ - абелева, то и коммутативности.
6) $(a^{-1})^{-1}=a\space\forall{a}\in{G}$
	$\blacktriangleright$ Поскольку $aa^{-1}=a^{-1}a=e$, то обратным к $a^{-1}$ является $a$.
7) $(a_1..a_n)^{-1}=a_n^{-1}..a_1^{-1}\forall{a_1,..,a_n\in{G}}$.
	$\blacktriangleright(a_1..a_n)(a_1^{-1}..a_n^{-1})=a_1..(a_na_n^{-1})..a_n=..=a_1a_1^{-1}=e\implies(a_1..a_n)^{-1}=(a_1^{-1}..a_n^{-1})$
  
Если $G=<G,*>$, то для $g\in{G}$, введем понятие m-й степени:

$g^m=\begin{cases}\underbrace{g*..*g}_{\text{m раз}},m>0\\\e,\qquad{}m=0\\\underbrace{g^{-1}*..*g^{-1}}_{\text{-m раз}},m<0\end{cases}$

Данное определение корректно в силу обобщенной ассоциативности.

**Утверждение**. $\forall\space{m,n}\in{Z},g\in{G}$ верны равенства: 
1) $g^ng^m=g^{m+n}$
	$\blacktriangleright{g^n}g^m=\underbrace{g..g}_{\text{n}}\underbrace{g..g}_{\text{m}}=\underbrace{g..g}_{\text{n+m}}=g^{n+m}$
2) $(g^m)^n=g^{nm}$
	$\blacktriangleright{(g^m)^n}=\underbrace{\underbrace{g..g}_{\text{m}}..\underbrace{g..g}_{\text{m}}}_{\text{n}}=\underbrace{g..g}_{\text{nm}}=g^{nm}$
  
**Порядком группы** наывается число ее элементов. (Порядок бесконечной группы  бесконечен)

**Порядком элемента** $g\in{G}$ называется наименьшее натуральное число $n$, такое что $g^n=e$. Обозначение: $O(g)$ или $|g|$.

Если в последовательности $g,g^2,g^3,..$ все элементы различны, то $O(g)=\infty$ и будем говорить, что $g$ имеет бесконечный порядок.

**Утверждение.** $O(g)=2\iff{g=g^{-1}}$
	$\blacktriangleright\implies:{O(g)=2}\iff{g^2=e}\iff{g^-1gg=g^{-1}e\iff{eg=g^{-1}\iff{}g=g^{-1}}}$
  $\quad\impliedby:{}g=g^{-1}\iff{g}g=g^{-1}g\iff{g^2}=e\iff{O(g)}=2$'
        ]);

        $questions = [
            [
                'q' => 'Как называют обратный элемент в аддитивной группе?',
                't' => 'task',
                'a' => 'противоположный'
            ],
            [
                'q' => 'Пусть $G$ - группа и $ab=ba=a$,a,b\in{G}, тогда как назывется элемент $b$',
                't' => 'task',
                'a' => 'нейтральный'
            ],
            [
                'q' => 'Пусть $G$ - группа, $g\in{G}$. Если $O(g)=k$, то чему равен порядок элемента $h=g^k,\space{h}\in{G}$?',
                't' => 'task',
                'a' => '1'
            ],
            [
                'q' => 'Пусть $<G,*>$ - группа, тогда',
                'a' => [
                    '$ab=ba\space\forall{a,b}\in{G}$',
                    '$(ab)c=a(bc)\space\forall{a,b,c}\in{G}$\'',
                    '$\exists\space{e}\in{G}:ae=ea=a\forall\space{a\in{G}}$',
                    '$\exists\space{e}\in{G}:ae=ea=e\forall\space{a\in{G}}$\''
                ],
                'c' => [false, true, true, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Теорема Вейдербурна',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Теорема**. Каждое конечное кольцо с делением коммутативно.

*Доказательство*: Пусть $R$ - конечное кольцо с делением. Для каждого $s\in{R}$ определим множество $C_s=\lbrace{xs=sx|x\in{R}}\rbrace$ элементов из $R$, коммутирующих с $s$.

$C_s$ содержит 0 и 1 и является подкольцом с делением кольца $R$.

$Z=\bigcup_{s\in{R}}C_s$ - центр (множество элементов, коммутирующих со всеми)

$0,1\in{Z}\implies{Z}-$ конечное поле

Положим  $|Z|=q$. Можем рассматривать $R,C_s$, как линейные пространства над $Z$, значит:
- $|R|=q^n,$ где $n$ - размерность $R$ над $Z$
- $|C_s|=q^{n_s}$, для некоторого целого числа $n_s\geq1$

Пусть теперь $R$ - это не поле. Это означает, что для некоторого $s\in{R}$ централизатор $C_s$ не совпадает с $R$ или $n_s<n$.

Рассмотрим на множестве $R^*=R\backslash{0}$ отношение $\backsim$:
->$r\'\backsim{r}\iff{r\'}=x^{-1}rx$, для некоторого $x\in{R^*}$<-

$\backsim$ есть отношение эквивалентности.

Пусть $A_A=\lbrace{x^{-1}sx|x\in{R}}\rbrace$ - класс эквивалентности, содержащий $s$.

Заметим, что $|A_A|=1$, только тогда, когда $s\in{Z}$, поэтому, в силу предположения, $\exists$ классы $A_s:|A_s|\geq{2}$.

Рассмотрим теперь для $s\in{R^*}$ отображение $f_s:x\to{x^{-1}sx}$ из $R^*$ в $A$. Тогда для $x,y\in{R^*}$:
->$x^{-1}sx=y^{-1}sy\iff{(yx^{-1})s=s(yx^{-1})}\iff{yx^{-1}}\in{C^*_s},C_s^*=C_s\backslash{0}$<-
причем мощность множества $C_s^*=\lbrace{zx:z\in{C_s^*}}\rbrace$ равна $C_s^*$.

Следовательно при отображении $f_s$ каждый элемент $x^{-1}sx$ является образом ровно $|C_s^*|=q^{n_s}-1$ элементов из $R^*$ и мы заключаем, что $|R^*|=|A_s||C_s^*|$. Таким образом
->$\frac{|R^*|}{|C_s^*|}=\frac{q^n}{q^{n_s}-1}=|A_s|$ - целое число $\forall{s}$<-

Классы эквивалентности образуют разбиение $R^*$ . Обозначим через $Z^*=Z\backslash{0}$ объединение одноэлементных классов эквивалентности и через $A_1...A_t$ - классы эквивалентности, содержащие более 1-го элемента. По предположению $t\geq1$

Равенство $R^*=|Z^*|+\displaystyle\sum_{k=1}^t{|A_k|}$ доказывает формулу классов
->$q^n-1=q-1+\displaystyle\sum_{k=1}^t{\frac{q^n-1}{q^{n_k}-1}}\quad(1),$ где $1<\frac{q^n-1}{q^{n_k}-1}\in{N}\space\forall{k}$<-

Покажем, что если $q^{n_k}-1|q^n-1$, то $n_k|n$

В самом деле, пусть $n=an_k+r,\space0\leq{r}<n_k$.

->$\begin{aligned}&q^{n_k}-1|q^n-1\iff\\&{q}^{n_k}-1|q^{an_k+r}-1\implies\\&{q}^{n_k}-1|(q^{an_k+r}-1)-(q^{n_k}-1)=q^{n_k}(q^{(a-1)n_k+r}-1)\implies\\&q^{n_k}-1|q^{(a-1)n_k+r}-1,\text{ т.к. }q^{n_k}\text{ и }q^{n_k}-1\text{ взаимно простые }\end{aligned}$<-

Продолжая, таким образом, за  $a$ шагов мы находим что $q^{n_k}-1|q^r-1$, где $0\leq{r}<n_k$, что возможно только при $r=0$, т.е. при $n_k|n$. Итак  $n_k|n\space\forall{k}$.

Рассмотрим многочлен $x^n-1$. Его (комплексные) корни - корни $n$-й степень из 1, т.к. $\lambda^n=1\space\forall\lambda,\lambda-$ корень, то $|\lambda|=1$, т.е. все они лежат на единичной окружности комплексной плоскости.

Они имеют вид $\lambda_k=e^{\frac{2ki\pi}{n}}=\cos(\frac{2k\pi}{n})+i\sin(\frac{2k\pi}{n}),k=\overline{0,n-1}$.

Некоторые корни $n$-й степени удовлетворяют также соотношениям $\lambda^d=1$ при $d<n$, например, при чётном $n$ для корня $\lambda=-1$ имеем $\lambda^2=1$. Для корня $\lambda$ обозначим через $d$ - порядок $\lambda$ в группе корней $n$-й степени из 1. Тогда $d|n$ согласно т. Лагранжа. Заметим, что $\exists$ корни $n$-й степени из 1 любого порядка $n$. Например $\lambda_1=e^{\frac{2i\pi}{n}}$.

Сгруппируем теперь все корни порядка $d$ вместе и положим
->$\Phi_d(x)=\displaystyle\prod_{ord(\lambda)=d}(x-\lambda)$<-

По определению $\Phi_d(x)$ не зависит от $n$. Т.к. каждый корень $n$-й степени из 1 имеет некоторый порядок $d$, мы заключаем, что
->$x^n-1=\displaystyle\prod_{d|n}{\Phi_d(x)}\quad(3)$<-

Коэффициенты многочленов $\Phi_n(x)$ являются целыми числами (т.е. $\Phi_n(x)\in{Z[x]}\space\forall{n}$), Кроме того, свободный член многочленов $\Phi_n(x)$ есть либо $1$ либо $-1$.

Убедимся в справедливости этого утверждения. 

При $n=1$ единственный корень $1$ и поэтому $\Phi_1(x)=x-1$. 

Далее, действуя по индукции, предположим, что $\Phi_d(x)\in{Z[x]\space\forall{d<n}}$ и что свободный член $\Phi_d(x)$ есть $1$ или $-1$. В силу $(3)$:
->$\space{x^n-1}=p(x)\Phi_n(x)\quad(4),$<- 
где $p(x)=\displaystyle\sum_{k=0}{a_kx^k}$причём либо $p_0=1$ либо $p_0=-1$.

Так как $p_0a_0=-1$, то $a_0\in\lbrace{-1,1}\rbrace$. Далее рассуждаем по индукции. Допустим, что уже известны $a_0,...,a_{k-1}\in{Z}$. Вычисляем коэффициент при $x^k$ в обеих частях $(4)$. Находим:
->$\displaystyle\sum_{j=0}^k{p_ja_{k-j}}=\displaystyle\sum_{j=1}^k{p_ja_{k-j}}+p_oa_k\in{Z}$<-

Согласно предположению, все коэффициенты $a_0,...,a_{k-1}$ (и все $p_j$) принадлежат $Z$, так как $p_0$ есть $1$ или $-1$, то $p_0a_k$ и,следовательно, $a_k$ также должны быть целыми числами.

Пусть $n_k|n$ - одно из чисел, фигурирующих в $(1)$. Тогда:
->$x^n-1=\displaystyle\prod_{d|n}{\Phi_d(x)}-(x^{n_k}-1)\Phi_n(x)\displaystyle\prod_{d|n,d|n_k,d\not=n}{\Phi_d(x)}$<-

Значит в $(2)$ выполняются отношения делимости:
->$\Phi_n(q)|q^n-1$ и $\Phi_n(q)|\frac{q^n-1}{q^{n_k}-1}\quad(5)$<-

Так как отношения $(5)$ справедливы $\forall{k}$, то из формулы $(1)$ получаем $\Phi_n(q)|q-1$, но этого быть не может.

Поэтому мы знаем, что $\Phi_n(x)-\prod(x-\lambda)$, где $\lambda$ пробегает всё множество корней двухчлена $x^n-1$, имеющих порядок $n$. Пусть $\lambda=a+ib$ - один из этих корней.

Так как $n>1$ (т.к. $R\not=Z$), то корень $\overline\lambda\not=1$, значит $a\space(=Re(\lambda))\space{<1}$. Далее, т.к. $|\overline\lambda^2|=a^2+b^2=1$ и $a<1$, то 
->$|q-\overline\lambda|^2=|q-a-ib|^2=(q-a)^2+b^2=q^2-2aq+a^2+b^2=q^2-2aq+1>q^2-2q+1=(q-1)^2$<-

Так что $|q-\overline\lambda|>q-1\geq1\space\forall$ корней из $1$ порядка $n$, следовательно $|\Phi_n(q)|=\displaystyle\prod_{\lambda}|q-\lambda|>q-1$.

Это означает, что $\Phi_n(q)$ не может быть делителем $q-1$. Полученное противоречие завершает доказательство.'
        ]);

        /*$questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => []
            ]
        ];
        $this->create_questions($lesson, $questions);*/

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Определение и примеры',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть $A$ - непустое множество, $+$ и $*$ - две бинарные алгебраические операции на $A$.

Тройка $<A,+,*>$ называется **кольцом**, если выполняется:
1) пара $<A,+>$ - абелева группа.
2) Операция $*$ дистрибутивна относительно $+$, т.е.
	$\forall{a,b,c}\in{A}$ выполняется $a*(b+c)=a*b+a*c$ и $(a+b)*c=a*c+b*c$
  
Если 
- $*$ - ассоциативна, то **кольцо ассоциативное**.
- $*$ - коммутативна, то **кольцо куммутативное**.
- относительно $*$ есть нейтральный элемент, то **кольцо с 1**.

Пусть $K_1=<A,+,*>$ и $K_2=<B,+,*>$ - два кольца. Отображение $\varphi:A\to{B}$ называется гомоморфизмом $K_1$ в $K_2$, если $\varphi(a+b)=\varphi(a)+\varphi(b)$ и $\varphi(a*b)=\varphi(a)*\varphi(b)$.

Свойства гомоморфизма:
1) $\begin{aligned}&\varphi(a)=\varphi(a+0)=\varphi(a)+\varphi(0)\\&\varphi(a)=\varphi(0+a)=\varphi(0)+\varphi(a)\end{aligned}\implies\varphi(0)=0$
2) $\begin{aligned}&\varphi(a)=\varphi(a*1)=\varphi(a)*\varphi(1)\\&\varphi(a)=\varphi(1*a)=\varphi(1)*\varphi(a)\end{aligned}\implies\varphi(1)=1$

Если $\varphi$ - взаимно однозначное отображение, то гомоморфизм называется **изоморфизмом.**

Пусть $K=<A,+,*>$ - кольцо. Пусть $B\subseteq{A}$. Если тройка $K_1=<B,+,*>$ является кольцом, то $K_1$ называется подкольцом кольца $K$.

Примеры колец:
✔︎ Пусть $Z=<Z,+,*>$ - кольцо целых чисел. $2Z\subseteq{Z}$ - подмножество $Z$ из четных целых чисел.

Рассмотрим $<2Z,+,*>$.
1) $2Z$ - абелева группа.
2) $*$ - алгебраическая операция на множестве четных чисел
	$*$ дистрибутивно относительно $+$.
  
Значит $<2Z,+,*>$ - кольцо (подкольцо кольца целых чисел).

Заметим, что кольцо $<Z,+,*>$ содержит 1, а $<2Z,+,*>$ не содержит (т.е. нет нейтрального относительно $*$).

✔︎ Пусть $Z=<Z,+,*>$ - кольцо. $m\in{N},m\not=1$, тогда

->$<mZ,+>$ - абелева группа<-

Рассмотрим фактор-группу 
->$Z/mZ=\lbrace{0+mZ,1+mZ,...,(m-1)+mZ}\rbrace$<-
В ней $m$ смежных классов. Эти смежные классы мы умеем складывать, т.е. $<Z/mZ,+>$ - абелева группа.

Определим операцию умножения:
->$(a+mZ)(b+mZ)=ab+mZ\quad(1)$<-

Покажем, что операция умножения определена корректно.

Пусть 
- $a+mZ=a\'+mZ\iff{a-a\'\in{mZ}\iff{a}=a\'+mz_1}$
- $b+mZ=b\'+mZ\iff{b-b\'\in{mZ}\iff{b}=b\'+mz_2}$

Согласно $(1)$:
->$(a+mZ)(b+mZ)=ab+mZ,\quad(a\'+mZ)(b\'+mZ)=a\'b\'+mZ$<-

Покажем, что $ab+mZ=a\'b\'+mZ$, что равносильно $ab-a\'b\'\in{mZ}\iff{ab}=a\'b\'+mz_3$

$ab=(a\'+mz_1)(b\'+mz_2)=a\'b\'+m\underbrace{(a\'z_2+b\'z_1+mz_1z_2)}_{\in{Z}}=a\'b\'+mz_3$

Проверим выполнение свойств операции $*$:
1) $*$ дистрибутивна относительно $+$
	$\blacktriangleright$
  ->$\quad\begin{gathered}(a+mZ)((b+mZ)+(c+mZ))=\\(a+mZ)((b+c)+mZ)=\\a(b+c)+mZ=ab+ac+mZ=\\ab+mZ+bc+mZ=\\(a+mZ)(b+mZ)+(a+mZ)(c+mZ)\end{gathered}$<-
  Аналогично проверяется, что $((a+mZ)+(b+mZ))(c+mZ)=(a+mZ)(c+mZ)+(b+mZ)(c+mZ)$
2) $*$ коммутативна
	$\blacktriangleright\quad(a+mZ)(b+mZ)=ab+mZ=ba+mZ=(b+mZ)(a+mZ)$
3) Есть 1, и это $1+mZ$
	$\blacktriangleright\quad(a+mZ)(1+mZ)=a*1+mZ=a+mZ=1*a+mZ=(1+mZ)(a+mZ)$
  
Таким образом $<Z/mZ,+,*>$ - коммутативное, ассоциативное кольцо с 1. Обозначают $Z_m$ - кольцо классов вычетов по модулю $m$.

**Теорема**. Элемент $a\in{Z_m}$ обратим тогда и только тогда, когда $(a,m)=1$

*Доказательство:* ($\implies$) Пусть $a$ обратим в кольце $Z_m$, тогда $\exists{b}:a*b=1+mZ$, что означает 
->${a*b}=1+mz_1,z_1\in{Z}\implies{a*b}-mz_1=1$<-
Если $d=(a,m)$, то так как левая часть последнего равенства делится на $d$, то и правая должна лелиться на $d$, но это возможно только если $d=1$.

($\impliedby$) Пусть $(a,m)=1$, тогда $\exists{x,y}:ax+my=1$, значит $ax=1-my\implies{x}=a^{-1}$. ∎

✔︎ Пусть $Q$ - множество рациональных чисел. Действительные числа $1$ и $\sqrt{3}$ линейно независимы над $$, т.е. 
->не существует $\frac{p}{q}\in{Q}:1*\frac{p}{q}=\sqrt{3}$<-

Докажем, что $\frac{p}{q}=\sqrt{3}$ не выполнено $\forall{p,q}$. Предположим, что $\exists{p,q}:\frac{p}{q}=\sqrt{3}$ и $(p,q)=1$, тогда ->$p=q\sqrt{3}\implies{p^2}=3q^2\implies3|p^2\implies3|p\implies$
${p}=3t\implies9t^2=3q^2\implies3t^2=q^2\implies3|q^2\implies$
$3|q\implies{q}=3s\implies(p,q)=3$<-
Но $(p,q)=1$, т.е. получили противоречие. ∎

Рассмотрим $Q(\sqrt{3})=\lbrace{a*1+b*\sqrt{3}|a,b\in{Q}}\rbrace$

Определим операцию сложения:

$(a_1+b_1*\sqrt{3})+(a_2+b_2*\sqrt{3})=(a_1+a_2)+(b_1+b_2)*\sqrt{3}$

Покажем, что $<Q(\sqrt{3}),+>$ - абелева группа
1) $0 = 0 + 0 * \sqrt{3}\in{Q(\sqrt{3})}$ нейтральный
2) $*$ - ассоциативна
->$\begin{gathered}((a_1+b_1*\sqrt{3})+(a_2+b_2*\sqrt{3}))+(a_3+b_3\sqrt{3})=\\((a_1+a_2)+(b_1+b_2)*\sqrt{3})+(a_3+b_3\sqrt{3})=\\((a_1+a_2)+a_3)+((b_1+b_2)+b_3)*\sqrt{3}=\\(a_1+(a_2+a_3))+(b_1+(b_2+b_3))*\sqrt{3}=\\(a_1+b_1*\sqrt{3})+((a_2+a_3)+(b_2+b_3)*\sqrt{3})=\\(a_1+b_1*\sqrt{3})+((a_2+b_2\sqrt{3})+(a_3+b_3*\sqrt{3}))\end{gathered}$<-
3) $-a_1-b_1*\sqrt{3}$ - противоположный к $a_1+b_1*\sqrt{3}$
4) $*$ - коммутативна
	$(a_1+b_1*\sqrt{3})+(a_2+b_2*\sqrt{3})=(a_1+a_2)+(b_1+b_2)*\sqrt{3}=(a_2+a_1)+(b_2+b_1)*\sqrt{3}=(a_2+b_2*\sqrt{3})+(a_1+b_1*\sqrt{3})$
  
Так, $<Q(\sqrt{3}),+>$ - абелева группа

Определим операцию умножения:

$(a_1+b_1*\sqrt{3})*(a_2+b_2*\sqrt{3})=(a_1*a_2+3*b_1*b_2)+(a_1*b_2+b_1*a_2)*\sqrt{3}$

$*$ - дистрибутивна.
$\blacktriangleright$
->$\begin{gathered}(a_1+b_1*\sqrt{3})*((a_2+b_2*\sqrt{3})+(a_3+b_3*\sqrt{3}))\\(a_1+b_1\sqrt{3})*((a_2+a_3)+(b_2+b_3)*\sqrt{3})=\\((a_1*(a_2+a_3))+3*b_1*(b_2+b_3))+(a_1*(b_2+b_3)+b_1*(a_2+a_3))*\sqrt{3}=\\((a_1*a_2+3*b_1*b_2)+(a_1*b_2+b_1*a_2)*\sqrt{3})+((a_1*a_3+3*b_1*b_3)+(a_1*b_3+b_1*a_3)*\sqrt{3})\end{gathered}$<-

$*$ - ассоциативна
->$\begin{gathered}((a_1+b_1*\sqrt{3})*(a_2+b_2*\sqrt{3}))*(a_3+b_3*\sqrt{3})=\\((a_1*a_2+3*b_1*b_2)+(a_1*b_2+b_1*a_2)*\sqrt{3})*(a_3+b_3*\sqrt{3})=\\((a_1*a_2+3*b_1*b_2)*a_3+3*(3*b_1*b_2)*b_3)+((a_1*a_2+3*b_1*b_2)*b_3+a_3*(a_1*b_2+b_1*a_2))*\sqrt{3}=\\(a_1+b_1*\sqrt{3})*((a_2*a_3+3*b_2*b_3)+(a_2*b_3+b_2*a_3)*\sqrt{3})=\\(a_1+b_1*\sqrt{3})*((a_2+b_2*\sqrt{3})*(a_3+b_3*\sqrt{3}))\end{gathered}$<-

$*$ - коммутативна
$\blacktriangleright$
->$\begin{gathered}(a_1+b_1*\sqrt{3})*(a_2+b_2*\sqrt{3})=\\(a_1*a_2+3*b_1*b_2)+(a_1*b_2+b_1*a_2)*\sqrt{3}=\\(a_2*a_1+3*b_2*b_1)+(b_1*a_2+a_1*b_2)*\sqrt{3}=\\(a_2+b_2*\sqrt{3})*(a_1+b_1*\sqrt{3})\end{gathered}$<-

$1 = 1*1+0*\sqrt{3}$ - нейтральный относительно $*$

Таким образом $<Q(\sqrt{3}),+,*>$ - коммутативное, ассоциативное кольцо с 1.

Определим, какие элементы обратимы в кольце $<Q(\sqrt{3}),+,*>$.

Допустим $a_2+b_2\sqrt{3}$ - обратный к $a_1+b_1*\sqrt{3}$, тогда

$1=1*1+0*\sqrt{3}=(a_1+b_1\sqrt{3})*(a_2+b_2\sqrt{3})=(a_1*a_2+3*b_1*b_2)*1+(a_1*b_2+b_1*a_2)*\sqrt{3}$

Приравняем множители при $1$ и $\sqrt{3}$ соответственно:

$\begin{cases}a_1*a_2+3*b_1*b_2=1\\a_1*b_2+b_1*a_2=0\end{cases}\implies\begin{cases}-b_1*a_2*b_2^{-1}*a_2+3*b_1*b_2=1\\a_1=-\frac{b_1*a_2}{b_2}\end{cases}\implies\frac{a_1}{a_2}=-\frac{b_1}{b_2}=a_2^2-3b_2^2$

Таким образом, при $\frac{a_1}{a_2}=-\frac{b_1}{b_2}=a_2^2-3b_2^2$ элемент ${a}_2+b_2\sqrt{3}$ - обратный к $a_1+b_1*\sqrt{3}$.

✔︎ Пусть $R$ - множество действительных чисел. Рассмотрим объекты $1$ и $i,i\not=1,i\not\in{R}$.

Определим множество $C$:
->$C=\lbrace{a*1+b*i|a,b\in{R},i=\sqrt{-1}}\rbrace$<-

Введем на множестве $C$ операции $+$ и $*$:

$(a_1*1+i*b_1)+(a_2*1+b_2*i)=(a_1+a_2)*1+(b_1+b_2)*i$

Несложно проверить, что $<C,+>$ - абелева группа.

$(a_1*1+i*b_1)*(a_2*1+i*b_2)=(a_1*a_2-b_1*b_2)*1+(a_1*b_2+b_1*a_2)*i$

Несложно проверить, что $*$ дистрибутивна, ассоциативна, коммутативна

$1=1*1+0*i$ - нейтральный, относительно $*$.

Таким образом, $<C,+,*>$ - коммутативное, ассоциативное кольцо с 1, называемое кольцом комплексных чисел.

**Утверждение.** $R$ изоморфно вкладывается в $C$.

*Доказательство:* Установим взаимнооднозначное отображение $\varphi$ из $R$ в $C$:
->$\varphi:R\to{C},\varphi(a)=a+0*i$<-

Покажем, что $\varphi$ - сохраняет операции:

$\varphi(a+b)=(a+b)+0*i=(a+0*i)+(b+0*i)=\varphi(a)+\varphi(b)$

$\varphi(a*b)=a*b+0*i=(a+0*i)*(b+0*i)=\varphi(a)*\varphi(b)$

$\varphi$ изоморфно относительно сложения и умножения колец.

Таким образом $R$ изоморфно вкладывается в $C$. ∎

$1\in{R},-1\in{R}\implies{-1}+0i\in{C}$

Уравнение $x^2=-1$ не имеет решений в кольце $R$.

Рассмотрим уравнение $x^2=-1$ в кольце $C$: $(0+1*i)^2=-1,$ поэтому  $x^2=-1$ в $C$ имеет решение.

**Теорема:** Уравнение $a_nx^n+a_{n-1}x^{n-1}+...+a_1x_1+a_0=0$, где $a_i\in{C},i=\overline{0,n}$ имеет (с учётом кратности) $n$ корней в $C$.

**Утверждение**. В любом кольце K выполняется $0*(-a)=-0*a,a\in{K}$.

*Доказательство.* $0*0=0*(a+(-a))=0*a+0*(-a)\implies0*a+0*(-a)=0\implies0*(-a)=-0*a$. ∎'
        ]);

//        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

//        $lesson = Lesson::Create([
//            'block_id' => $blocks[2]->id,
//            'active' => true,
//            'name' => 'Кольцо $Q(\sqrt{3})$',
//            'resources' => json_encode(['http:://hello.ru']),
//            'sort' => 1,
//            'text' => ''
//        ]);

//        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Кольцо многочленов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть $K$ - кольцо. $x\not\in{K}$ - переменная. **Многочленом** от $x$ над $K$ назовём выражение следующего вида:
->$f(x)=a_0+a_1x+a_2x^2+...+a_mx^m,\space{a_i}\in{K},i=\overline{0,m}$ <-

Наибольшее $i$, такое что $a_i\not=0$ называется **степенью** многочлена и обозначается $\deg{f}$.

Например для многочлена $f(x)=1+2x+x^2+0x^3+0x^4,\space{a}_4=0,a_3=0,a_2=1\not=0\implies\deg{f}=2$

Элементы кольца $a_0,a_1,...,a_m$ - **коэффициенты многочлена**.

Выражение вида $a_ix^i$ - **слагаемое**.

Назовём многочлены $f_1(x)=a_0+a_1x+...+a_mx^m$ и $f_2(x)=b_0+b_1x+...+b_nx^n$ неотличимыми (равными), если совпадают две бесконечные последовательности:
->$a_0,a_1,...,a_m,0,0,...,0,...$ и  $b_0,b_1,...,b_n,0,0,...,0,...$<-
т.е. $a_0=b_0,a_1=b_1,...$

Например многочлены $f_1(x)=1+2x+x^2+0x^3+0x^4$ и $f_2(x)=1+2x+x^2$ неотличимы, так как: 
->$a_0=b_0=1,a_1=b_1=2,a_2=b_2=1,a_3=0=0,a_4=0=0$<-

**Теорема.** Отношение неотличимости есть отношение эквивалентности.

*Доказательство:* Обозначим последовательность коэффициентов многочлена $f_i(x)$, дополненную бесконечным колличеством нулей за $p_i$
1) Рефлексивность. $f_1(x)$ неотличим от себя так как ясно, что $p_1=p_1$.
2) Симметричность: Пусть $f_1(x)$ неотличим от $f_2(x)$, тогда $p_1=p_2\implies{p_2=p_1}\implies{f}_2(x)$ неотличим от $f_1(x)$.
3) Транзитивность: Пусть $f_1(x)$ неотличим от $f_2(x)$ и $f_2(x)$ неотличим от $f_3(x)$, тогда:

->$p_1=p_2\And{p_2}=p_3\implies{p_1}=p_3\implies{f_1(x)}$ неотличим от $f_3(x)$<-

Пусть $K[x]$ - множество классов вычетов.

На $K[x]$ определим операцию сложения:

$K_1+K_2=?$

В $K_1$ и $K_2$ находим 2 многочлена, имеющих одинаковое число слагаемых:
->$f_1=a_0+a_1x+...+a_mx^m,f_2=b_0+b_1x+...+b_mx^m$<-
Тогда $K_1+K_2=K_3,$ где $K_3$ содержит многочлен $f_3=(a_0+b_0)+(a_1+b_1)x+...+(a_m+b_m)x^m$

Покажем, что это определение корректно:
Пусть :
->$f_1=a_0+a_1x+...+a_mx^m,f_1\'=a_0\'+a_1\'x+...+a_m\'x^m+a_{m+1}\'x^{m+1}+...+a_t\'x^t\in{K_1}$<-
->$f_2=b_0+b_1x+...+b_mx^m,f_2\'=b_0\'+b_1\'x+...+b_m\'x^m+b_{m+1}\'x^{m+1}+...+b_t\'x^t\in{K_2}$<-

Тогда с одной стороны:
->$K_1+K_2=[(a_0+b_0)+(a_1+b_1)x+...+(a_m+b_m)x^m]$<-
А с другой стороны:
->$K_1+K_2=[(a_0\'+b_0\')+(a_1\'+b_1\')x+....+(a_t\'+b_t\')x^t]$<-

Покажем, что результаты совпадают, т.е. полученные многочлены неотличимы:

Имеем:
->$a_0=a_0\',a_1=a_1\',...,a_m=a_m\',0=a_{m+1}\',...,0=a_t\'$<-
->$b_0=b_0\',b_1=b_1\',...,b_m=b_m\',0=b_{m+1}\',...,0=b_t\'$<-

->$\Downarrow$<-
->$a_0+b_0=a_0\'+b_0\',a_1+b_1=a_1\'+b_1\',...,a_m+b_m=a_m\'+b_m\',0=a_{m+1}\'+b_{m+1}\',...,0=a_t\'+b_t\'$<-

Таким образом, убедились, что результаты совпадают.

(Это тоже самое, что $\frac{2}{16}+\frac{4}{16}=\frac{1}{8}+\frac{1}{4}$)

**Теорема:** $<K[x],+>$ - абелева группа.

*Доказательство:* 
1) $+$ ассоциативна
	$\blacktriangleright$
	->$\begin{gathered}(K_1+K_2)+K_3=[(a_0+b_0)+(a_1+b_1)x+...+(a_m+b_m)x^m]+[c_0+c_1x+...+c_mx^m]\\=[((a_0+b_0)+c_0)+((a_1+b_1)+c_1)x+...+((a_m+b_m)+c_m)x^m]\\=[(a_0+(b_0+c_0))+(a_1+(b_1+c_1))x+...+(a_m+(b_m+c_m))x^m]\\=[a_0+a_1x+...+a_mx^m]+[(b_0+c_0)+(b_1+c_1)x+...+(b_m+c_m)x^m]=K_1+(K_2+K_3)\end{gathered}$<-
2) $0=0+0x+0x^2+...$ - нейтральный элемент
	$\blacktriangleright$
    ->$\begin{gathered}{K}_1+0=[(a_0+0)+(a_1+0)x+...+(a_m+0)x^m]\\=[a_0+a_1x+...+a_mx^m]=\\{}[(0+a_0)+(0+a_1)x+...+(0+a_m)x^m]=0+K_1\end{gathered}$<-
3) $-K_1$ - противоположный к $K_1$, $(-a_0)+(-a_1)x+...+(-a_m)x^m\in{-K_1}$ 
	$\blacktriangleright$
	->$\begin{gathered}{}K_1+(-K_1)=[(a_0+(-a_0))+(a_1+(-a_1))x+...+(a_m+(-a_m))x^m]\\=[0+0x+...+0x^m]=\\{}[((-a_0)+a_0)+((-a_1)+a_1)x+...+((-a_m)+a_m)x^m]=(-K_1)+K_1\end{gathered}$<-
4) $+$ коммутативна
	$\blacktriangleright\quad{K_1+K_2=[(a_0+b_0)+(a_1+b_1)x+...+(a_m+b_m)x^m]=[(b_0+a_0)+(b_1+a_1)x+...+(b_m+a_m)x^m]=K_2+K_1}$
  
Таким образом, $<K[x],+>$ действительно абелева группа. ∎

На $K[x]$ определим операцию умножения:

$K_1*K_2=?$

В $K_1$ и $K_2$ находим 2 многочлена, имеющих одинаковое число слагаемых:
->$f_1=a_0+a_1x+...+a_mx^m,f_2=b_0+b_1x+...+b_mx^m$<-
Тогда $K_1*K_2=K_3,$ где $K_3$ содержит многочлен $f_3=c_0+c_1x+...+c_{2m}x^{2m}$, где $c_i=\displaystyle\sum_{t+s=i}{a_tb_s},i=\overline{0,2m}$

Покажем, что это определение корректно:

Пусть :
->$f_1=a_0+a_1x+...+a_mx^m,f_1\'=a_0\'+a_1\'x+...+a_m\'x^m+a_{m+1}\'x^{m+1}+...+a_t\'x^t\in{K_1}$<-
->$f_2=b_0+b_1x+...+b_mx^m,f_2\'=b_0\'+b_1\'x+...+b_m\'x^m+b_{m+1}\'x^{m+1}+...+b_t\'x^t\in{K_2}$<-

Тогда с одной стороны:
->$K_1*K_2=[c_0+c_1x+...+c_{2m}x^{2m}],c_i=\displaystyle\sum_{l+s=i}{a_lb_s},i=\overline{0,2m}$<-
А с другой стороны:
->$K_1*K_2=[c_0\'+c_1\'x+...+c_{2t}x^{2t}],c_i=\displaystyle\sum_{l+s=i}{a_l\'b_s\'},i=\overline{0,2t}$<-

Покажем, что результаты совпадают, т.е. полученные многочлены неотличимы:

Имеем:
->$a_0=a_0\',a_1=a_1\',...,a_m=a_m\',0=a_{m+1}\',...,0=a_t\'$<-
->$b_0=b_0\',b_1=b_1\',...,b_m=b_m\',0=b_{m+1}\',...,0=b_t\'$<-

->$\Downarrow$<-
->$c_0=c_0\',c_1=c_1\',...,c_{2m}=c_{2m}\',0=c_{2m+1}\',...,0=c_{2t}\'$<-

Таким образом, убедились, что результаты совпадают.

Покажем, что в $K[x]$ умножение дистрибутивно относительно сложения

->$\begin{gathered}K_1*(K_2+K_3)=[a_0+a_1x+...+a_mx^m]*([b_0+b_1x+...+b_mx^m]+[c_0+c_1x+...+c_mx^m])\\=[a_0+a_1x+...+a_mx^m]*[(b_0+c_0)+(b_1+c_1))x+...+(b_m+c_m)x^m]\\=[\displaystyle\sum_{l+s=0}{a_l(b_s+c_s)}+\displaystyle\sum_{l+s=1}{a_l(b_s+c_s)}x+...+\displaystyle\sum_{l+s=2m}{a_l(b_s+c_s)}x^m]\\=[\displaystyle\sum_{l+s=0}{a_lb_s}+\displaystyle\sum_{l+s=0}{a_lc_s}+\displaystyle\sum_{l+s=1}{a_lb_s}x+\displaystyle\sum_{l+s=1}{a_lc_s}x+...+\displaystyle\sum_{l+s=2m}{a_lb_s}x^m+\displaystyle\sum_{l+s=2m}{a_lc_s}x^m]\\=[\displaystyle\sum_{l+s=0}{a_lb_s}+\displaystyle\sum_{l+s=1}{a_lb_s}x+...+\displaystyle\sum_{l+s=2m}{a_lb_s}x^m]+[\displaystyle\sum_{l+s=0}{a_lc_s}+\displaystyle\sum_{l+s=1}{a_lc_s}x+...+\displaystyle\sum_{l+s=2m}{a_lc_s}x^m]\\=K_1K_2+K_1*K_3\end{gathered}$<-

Таким образом $K[x]$ - кольцо.

$e=1+0x$ - нейтральный в $K[x]$, относительно умножения.

Покажем, что в $K[x]$ умножение ассоциативно ( ? пока не ясно, надо доказать, потом докажу, сейчас нет времени )

->$\begin{gathered}K_1*(K_2*K_3)=...=(K_1*K_2)*K_3\end{gathered}$<-

Покажем, что в $K[x]$ умножение коммутативно ( ? пока не ясно, надо доказать, потом докажу, сейчас нет времени )

->$\begin{gathered}K_1*K_2=...=K_2*K_1\end{gathered}$<-

**Теорема**. Кольцо $K$ изоморфно вкладывается в кольцо многочленов $K[x]$.

*Доказательство:* Отображение $\varphi:K\to{K[x]},a\mapsto{a}+0x$ задаёт изоморфное вложение $K$ в $K[x]$.

Покажем, что оно сохраняет операции:
->$\varphi(a+b)=(a+b)+0x=(a+b)+(0+0)x=a+ox+b+ox=\varphi(a)+\varphi(b)$<-
->$\varphi(ab)=ab+0x=ab+0x+0x^2=(a+0x)(b+0x)=\varphi(a)\varphi(b)$<-

$\varphi$ изоморфно относительно сложения и умножения колец.'
        ]);

//        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Деление в кольце многочленов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Если $f(x)=g(x)h(x)$, то будем говорить, что 
- $f(x)$ делится на $g(x)$ и на $h(x)$ 
- $g(x)$ и $h(x)$ являются делителями $f(x)$ 
- $f(x)$ разложим на множители

Пусть $c$ - обратимый элемент кольца, тогда для любого многочлена $f(x)$ справедливо:
->$f(x)=c(c^{-1}f(x))$<-

$c$ - многочлен, т.к. $c=c+0x+0x^2+...,c^{-1}=c^{-1}+0x+0x^2+...$

Такие разложения назовём **тривиальными**.

Пусть, например, $K=Z$. В $Z$ обратимыми являются $1$ и $-1$. Поэтому справедливы тривиальные разложения:
->$f(x)=1*f(x),f(x)=-1*(-1*f(x))$<-

Многочлен $f(x)$ называется неприводимым над кольцом, если он не имеет разложений, отличных от тривиальных.

Например многочлен $f(x)=1+x^2$
- неприводим, если он рассматривается над кольцом действительных чисел $R$.
- приводим, если он рассматривается над кольцом комплексных чисел $C$, его разложение $f(x)=(1+ix)(1-ix)$.

#### Деление с остатком

Пусть $f(x)=a_0+a_1x+...+a_mx^m$ и $g(x)=b_0+b_1x+...+b_nx^n,\deg{g(x)}\geq0$ - два многочлена, тогда существуют единственные многочлены $h(x)$ и $r(x)$, такие, что:
- $f(x)=g(x)h(x)+r(x)$
- $\deg{r(x)}\leq{\deg{g(x)}}$

*Доказательство:* Для случая, когда в $K$ все элементы, кроме 0, обратимы. Рассмотрим случаи:
- $n>m,$ тогда $f(x)=g(x)*0+f(x)$
- $n=m,$ тогда $f(x)=a_mb_m^{-1}g(x)+r(x)$
- $n<m$, тогда $f(x)=a_mb_n^{-1}x^{n-m}g(x)+r_1(x),\deg{r_1(x)}<m$

Повторим процедуру к многочлену $r_1(x)$, до тех пор пока не получим многочлен, степень которого меньше степени $g(x)$. После этого, используя дистрибутивность, $g(x)$ вынесем за скобку.

Пусть $\alpha\in{K}$. Определим значения многочлена $f(x)=a_0+a_1x+...+a_mx^m$ в точке $\alpha$ следующим образом: Если $f(\alpha)=0$, то $\alpha$ - корень многочлена.

**Теорема (Безу)**. $\alpha$ - корень многочлена $f(x)\iff{f(x)}=(x-\alpha)g(x)$.

*Доказательство:* ($\implies$) Пусть $\alpha$ - корень $f(x)$ и $f(x)=(x-\alpha)g(x)+r(x),\deg{r(x)}<1\implies{r(x)=0}$ или $c\not=0$, тогда 
->$0=f(\alpha)=(\alpha-\alpha)g(\alpha)+r(\alpha)\implies{r}=0$<-

($\impliedby$) Если $f(x)=(x-\alpha)g(x)$, то $f(\alpha)=(\alpha-\alpha)g(\alpha)=0$, т.е. $\alpha$ - корень многочлена.

#### Схема Горнера

Пусть $f(x)=a_mx^m+a_{m-1}x^{m-1}+...+a_1x+a_0$ и $f(x)=(x-\alpha)g(x)+r(x),r(x)-const$ (т.е. элементы кольца)

Пусть $g(x)=b_{m-1}x^{m-1}+b_{m-2}x^{m-2}+...+b_1x+b_0$

Задача: Зная $a_m,a_{m-1},...,a_1,a_0,\alpha$ найти $b_{m-1},b_{m-2},...,b_1,b_0$.

Решение: 
->$\begin{gathered}(x-\alpha)g(x)=\\b_{m-1}x^m+b_{m-2}x^{m-1}+...+b_1x^2+b_0x-\alpha{b_{m-1}x^{m-1}}-\alpha{b_{m-2}x^{m-2}}-...-\alpha{b_1x}-\alpha{b_0}=\\b_{m-1}x^m+(b_{m-2}-\alpha{b_{m-1}})x^{m-1}+...+(b_0-\alpha{b_1})x-\alpha{b_0}\end{gathered}$<-

Приравняем коэффициенты при разных степенях $x$:

->$b_{m-1}=\alpha*0+a_m$
$b_{m-2}=\alpha*b_{m-1}+a_{m-1}$
$b_{m-3}=\alpha*b_{m-2}+a_{m-2}$
...<-'
        ]);

        //        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Идеалы колец и факторкольца',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть $K$ - кольцо и $I$ - подкольцо.

Если $I$ замкнуто относительно умножения слева и справа на элементы кольца (т.е. $I*K=\lbrace{a*b|a\in{I},b\in{K}}\rbrace\subseteq{I}$ и $K*I\subseteq{I}$), то $I$ называется **идеалом**.

Рассмотрим некоторые примеры:

✔︎ $<Z,+,*>$ - кольцо, $<mZ,+,*>$ - подкольцо.

Очевидно, что $mZ*Z\subseteq{Z}$ и $Z*mZ\subseteq{Z}$

Таким образом, $<mZ,+,*>$ - идеал.

✔︎ $K=<Q,+,*>$ - кольцо. $Q$ - множество рациональных чисел. $K\'=<Z,+,*>$ - подкольцо кольца $K$.
$K*Q\nsubseteq{K\'}(2\in{K\'},\frac{1}{3}\in{Q},2*\frac{1}{3}\not\in{K\'})\implies{K\'}$ не является идеалом в кольце $K$.

**Теорема.** Если $I_1$ и $I_2$ - идеалы в кольце $K$, то их пересечение $I_1\cap{I_2}$ - идеал в $K$.

*Доказательство:*

Покажем, что $I_1\cap{I_2}$ замкнуто относительно сложения и умножения:
->$a,b\in{I_1\cap{I_2}}\implies{a,b\in{I_i}}\implies{a+b\in{I_i},a*b\in{I_i}}\implies{a+b}\in{I_1\cap{I_2}},a*b\in{I_1\cap{I_2}}$<-

Свойства оперпций следуют из свойств операций в кольце $K$.

Если $a\in{I_1\cap{I_2}}$, то $a\in{I_i}\implies{-a\in{I_i}}\implies{-a\in{I_1\cap{I_2}}}$

$0\in{I_1},0\in{I_2}\implies0\in{I_1\cap{I_2}}$

Пусть $a\in{I_1\cap{I_2}},b\in{K}$, тогда
->${a*b}\in{I_i},b*a\in{I_i}\implies{a*b}\in{I_1\cap{I_2}},b*a\in{I_1\cap{I_2}}$, т.е. $(I_1\cap{I_2})*K\in{I_1\cap{I_2}},K*(I_1\cap{I_2})\in{I_1\cap{I_2}}$<-

Таким образом $I_1\cap{I_2}$ - идеал в $K$. ∎

**Следствие:** Пересечение любого множества идеалов есть идеал.

**Теорема**. Пусть $K$ - кольцо, $A\subseteq{K}$. $A$ - идеал, если
1) $\forall{a,b}\in{A}$ выполняется $a+(-b)\in{A}$
2) $A$ замкнуто относительно умножения на элементы $K$ слева и справа.

*Доказательство:* 
1) $0=a+(-a)\in{A}$
2) $-a=0+(-a)\in{A}$ - обратный к $a\in{A}$
3) Пусть $a,b\in{A},$ тогда $a+b=a+(-(-b))\in{A}$

Пусть $K$ - кольцо, $A\subseteq{K}$. Идеалом, порождённым $A$ называется пересечение всех идеалов, содержащих $A$. Такой идеал обозначим $(A)$.

Идеал, порождённый одним элементом называется главным. Если $A=\lbrace{a}\rbrace$, то $(A)$ - главный идеал.

**Теорема.** Пусть $K$ - коммутативное кольцо с единицей. $A\subseteq{K},$ тогда $(A)=\lbrace{\sum{a_i*b_i}|a_i\in{A},b_i\in{K}}\rbrace$

*Доказательство*: Обозначим $B=\lbrace{\sum{a_i*b_i}|a_i\in{A},b_i\in{K}}\rbrace$.

Очевидно, что $B\subseteq{(A)}$

Покажем, что $(A)\subseteq{B}$, для этого покажем, что $B$ является идеалом.

Если $a=\sum{a_i*b_i},b=\sum{a_i*b_i\'},$ то $a+(-b)=\sum{a_i*(b_i\'+(-b_i))}\in{B}$

Пусть $a\in{B},x\in{K},$ тогда 
->$x*a=x*\sum{a_i*b_i}=\sum{a_i*\underbrace{b_i*x}_{\in{K}}}\in{B}$
$a*x=(\sum{a_i*b_i})*x=\sum{a_i*\underbrace{b_i*x}_{\in{K}}}\in{B}$<-

Показали, что $B$ является идеалом. Следовательно $(A)\subseteq{B}$

Таким образом $A=B$. ∎

**Утверждение**. В кольце $Z$ любой идеал порождается одним элементом.

*Доказательство*: Пусть $I$ - идеал в кольце $Z$. Пусть $d$ - наименьший положительный элемент в $I$.

Покажем, что все элементы $I$ делятся на $d$.

Пусть $a\in{I},$ тогда выполним деление с остатком:
->$a=d*b+r,\quad{r}<d\space(a\not=0)\implies{r=0}$ (т.к. $d$ - наименьший) , т.е. $I=dZ$ ∎<-

Пусть $K$ - кольцо, $I$ - идеал в $K$. На множестве элементов $K$ введем отношение $\equiv$ : 
->$a\equiv{b}\iff{a}+(-b)\in{I}$<-

**Теорема**. $\equiv$ - отношение эквивалентности.

*Доказательство:* 
1) Рефлексивность. $a+(-a)=0\in{I}\implies{a\equiv{a}}$
2) Симметричность. $a\equiv{b}\implies{a}+(-b)\in{I}\implies-(a+(-b))\in{I}\implies{b}+(-a)\in{I}\implies{b\equiv{a}}$
3) Транзитивность. $a\equiv{b},b\equiv{c}$, тогда $a+(-c)=\underbrace{(a+(-b))}_{\in{I}}+\underbrace{(b+(-c))}_{\in{I}}\in{I}$. ∎

Таким образом, множество $K$ разбивается на классы эквивалентности или смежные классы по идеалу $I$.

Каждый смежный класс есть $a+I=\lbrace{a+i|i\in{I}}\rbrace$

$a+I=b+I\iff{a+(-b)\in{I}}$

Множество смежных классов по идеалу $I$ обозначим $K/I$.

На множестве смежных классов, положим:
->$(a+I)+(b+I)=(a+b)+I$<-
->$(a+I)*(b+I)=a*b+I$<-

Покажем корректность последних равенств.

Пусть $a+I=a\'+I,b+I=b\'+I$. Покажем, что $(a+I)+(b+I)=(a\'+I)+(b\'+I)$ и $(a+I)*(b+I)=(a\'+I)*(b\'+I)$.

$(a\'+\'b)+(-(a+b))=\underbrace{(a\'+(-a))}_{\in{I}}+\underbrace{(b\'+(-b))}_{\in{I}}\in{I}\implies(a\'+b\')+I=(a+b)+I$
$a\'*\'b+(-(a*b))=a\'*b\'-a\'*b+a\'*b-a*b=\underbrace{a\'*(b\'+(-b))}_{\in{I}}+\underbrace{b*(a\'+(-a))}_{\in{I}}\in{I}\implies(a+I)*(b+I)=(a\'+I)*(b\'+I)$

Покажем, что $<K/I,+,*>$ - кольцо.
1) $(a+I)+(b+I)=(a+b+I=(b+a)+I=(b+I)+(a+I)$
2) $0 = 0 +I = I$
3) $-(a+I)=-a+I$

$<K/I,+,*>$ - фактор-кольцо кольца $K$ по идеалу $I$.

**Полем** называется ассоциативное, коммутативное кольцо с $1\not=0$, в котором все ненулевые элементы обратимы.

Примеры полей:
- $<Z,+,*>$
- $<Q,+,*>$
- $<R,+,*>$
- $<C,+,*>$

Пусть $K$ - поле, $K[x]$ - кольцо многочленов. В $K[x]$ работает алгоритм деления с остатком и следовательно в $K[x]$ все идеалы главные, т.е. каждый идеал в $K[x]$ порождается одним элементом (многочленом).

->$I=(f(x))=\lbrace{h(x)*f(x)|h(x)\in{K[x]}}\rbrace$<-

 Рассмотрим смежные классы $\varphi(x)+(f(x)),\varphi\'(x)+(f(x))$
 
 $\varphi(x)+(f(x))=\varphi\'(x)+(f(x))\iff{\varphi(x)}+(-\varphi\'(x))\in{I}$ или $\varphi(x)+(-\varphi\'(x))=f(x)*t(x)\iff\varphi(x)$ и $\varphi\'(x)$ дают одинаковые остатки при делении на $f(x)$.
 
 **Утверждение**. Кольцо $<K[x]/I,+,*>$ содержит делители нуля, если многочлен $f(x)$ - порождающий $I$, является приводимым многочленом.
 
 Чтобы не было делителей нуля в фактор-кольце, надо чтобы $f(x)$ был неприводим и чтобы в самом кольце не было делителей нуля.'
        ]);

        //        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[3]->id,
            'active' => true,
            'name' => 'Поля',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Поле** - ассоциативное, коммутативное кольцо с $1\not=0$, в котором все ненулевые элементы обратимы.

$F=<A,+,*>$ - поле.

Если $A$ конечно, то и поле конечно.

Конечное поле из $q$ элементов обозначают $GF(q)$ или $F_q$.

Примеры полей:

✔︎ Пусть:
- $<Q,+,*>$ - поле рациональных чисел. 
- $Z=<Z,+,*>$ - кольцо целых чисел. 
- $N\subseteq{Z}$.

Рассмотрим пары $\frac{a}{b}\space,a,b\in{N}$. На этих парах введем отношение эквивалентности:
->$\frac{a}{b}\equiv\frac{c}{d}\iff{a*d}=b*c$<-

$<Z/\equiv,+,*>$ - поле $Q$

$Z\subseteq{Q}$ (с точностью до изоморфизма)

Например $-2\in{Z}\to\lbrace{-\frac{2}{1},-\frac{4}{2},-\frac{6}{3},...}\rbrace$

✔︎ Пусть $<R,+,*>$ - поле действительных чисел.

$C=R[x]/(x^2+1)$

$K=<C,+,*>$ - кольцо.

Рассмотрим $x=a+ib\in{K}$. Если $x\not=0$, те $a^2+b^2\not=0$, то $x^{-1}=\frac{1}{a+ib}=\frac{a-ib}{a^2+b^2}=\underbrace{\frac{a}{a^2+b^2}}_{\in{R}}+(-i)\underbrace{\frac{b}{a^2+b^2}}_{\in{R}}\in{K}$.

Значит $\forall{x}\in{K},x\not=0\space\exists{x^{-1}}:x*x^{-1}=1+i*0$. $x^{-1}$ - обратный к $x$ в $K$. Значит $K$ - поле.

$Q\subseteq{R}\subseteq{C}$.
$x\in{C}\implies{x}=a+i*b,a,b\in{R}$
${R}\subseteq{C},\quad{r}\in{R}\mapsto{r}+i*0$
${Z}\subseteq{C},\quad{z}\in{Z}\mapsto{z}+i*0$

✔︎ Рассмотрим $Z_m=<Z/mZ,+,*>$ - кольцо классов вычетов по модулю $m$.

**Утверждение.** $Z_m$ - поле $\iff{m}$ - простое число.

$<Z/mZ,+,*>-$ конечное поле $GF(m)$.

Пусть $F_1=<A,+,*>$ и $F_2=<B,+,*>$ - два поля.

$\varphi:A\to{B}$ - гомоморфизм, если 
- $\varphi(a+b)=\varphi(a)+\varphi(b)$
- $\varphi(a*b)=\varphi(a)*\varphi(b)$

Покажем, что $\varphi(0)=0$:
->$\varphi(0)+\varphi(a)=\varphi(0+a)=\varphi(a)=\varphi(a+0)=\varphi(a)+\varphi(0)\implies\varphi(0)=0$<-

Покажем, что $-\varphi(a)=\varphi(-a)$
->$0=\varphi(0)=\varphi(a+(-a))=\varphi(a)+\varphi(-a)\implies{-\varphi(a)=\varphi(-a)}$<-

$\ker\varphi=\lbrace{a|\varphi(a)=0}\rbrace$

Пусть $a\in\ker\varphi$ и $a\not=0$, тогда $\varphi(1)=\varphi(a*a^{-1})=\varphi(a)*\varphi(a^{-1})=0*\varphi(a^{-1})=0\implies{1}\in\ker\varphi$

$\varphi(b)=\varphi(1*b)=\varphi(1)*\varphi(b)=0*\varphi(b)=0,$ т.о., если $\ker\varphi\not=0$, то $\ker\varphi=A$.

Пусть $F=<A,+,*>$ - поле, $B\subseteq{A}$.

Если тройка $F\'=<B,+,*>$ - поле, то $F\'$ называется **подполем** поля $F$.

Очевидно, что $F$ - подполе поля $F$ (несобственное).

Поле называется **простым**, если оно не содержит подполей, отличных от несобственных.

Примеры:
- $C$ - не является простым ($R\subseteq{C}$).
- $Q$ - простое.
- $Z_m$ - простое ($m$ - простое число).

**Теорема.** Для любого поля $$, существует единственное простое подполе (либо $Q$ либо $Z_m$, ($m$ - простое число)).

*Доказательство:* (Единственность) Пусть $F_1$ и $F_2$ - простые подполя поля $F$, тогда $F_1\cap{F_2}$ - поле. Тогда
->$\begin{cases}F_1,F_2-\text{ простые}\\F_1\cap{F_2}\in{F_1}\\F_1\cap{F_2}\in{F_2}\end{cases}\implies{F_1=F_1\cap{F_2}=F_2}$<-

(Существование) Пусть $F_1$ - простое подполе. Покажем, что $F_1$ - либо $Q$ либо $Z_m$.

Ясно, что $1\in{F_1}$.

Рассмотрим $Z$ - множество всех целых чисел.

Рассмотрим отображение $\varphi:Z\to{F_1},\varphi(m)=\underbrace{1+...+1}_{m\text{ раз}}$.

Покажем, что $\varphi$ - гомоморфизм:

$\varphi(m+n)=\underbrace{1+...+1}_{m+n\text{ раз}}=\underbrace{1+...+1}_{m\text{ раз}}+\underbrace{1+...+1}_{n\text{ раз}}=\varphi(m)+\varphi(m)$
$\varphi(m*n)=\underbrace{1+...+1}_{m*n\text{ раз}}=\underbrace{\underbrace{1+...+1}_{m\text{ раз}}+...+\underbrace{1+...+1}_{m\text{ раз}}}_{n\text{ раз}}=(\underbrace{1+...+1}_{m\text{ раз}})*(\underbrace{1+...+1}_{n\text{ раз}})=\varphi(m)*\varphi(m)$

Рассмотрим $\ker\varphi$. Возможно 2 варианта:

1) $\ker\varphi=0,$ тогда обозначим $m=\underbrace{1+...+1}_{m\text{ раз}}$, тогда $F_1$ содержит $Z\implies{F_1}$ содержит $Q$, т.е. $F_1=Q$. ∎
2) $\ker\varphi\not=0.$ Пусть $m\in\ker\varphi$, тогда $\varphi(m*n)=\varphi(m)*\varphi(n)=0*\varphi(n)=0\implies$ все простые $m$ (т.е. $mZ$) изоморфно ядру.

Если поле $F$ содержит простое подполе $Q$, то будем говорить, что характеристика поля равна $0$.

Если поле $F$ содержит простое подполе $Z_m$, то будем говорить, что характеристика поля равна $m$.

Значит в поле нет делителей нуля.

Если $a*b=0$ и $a\not=0$, то $a^{-1}*a*b=a^{-1}*0\implies{b=0}$

Если нет такого $m$, что $\underbrace{1+...+1}_{m\text{ раз}}$, то будем говорить, что поле имеет характеристику $0$. Если же такие $m$ есть, то наименьшее такое $m$ назовём характеристикой поля.

Если $Z_m$ - простое подполе поля $F$, то $\underbrace{1+...+1}_{m\text{ раз}}=0$ в поле $Z_m\iff\underbrace{1+...+1}_{m\text{ раз}}=0$ в поле $F$.

Если $m$ - характеристика поля, то $\underbrace{a+...+a}_{m\text{ раз}}=\underbrace{a*1+...+a*1}_{m\text{ раз}}=a*(\underbrace{1+...+1}_{m\text{ раз}})=a*0=0,\space\forall{a}\not=0$

Обозначим $char(F)$ - характеристика поля $F$

Например $char(Q)=char(R)=char(C)=0,char(Z_2)=2,char(Z_5)=5$.'
        ]);

        //        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        lesson = Lesson::Create([
            'block_id' => $blocks[3]->id,
            'active' => true,
            'name' => 'Расширение полей',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Если для полей $F_1$ и $F_2$ выполняется $F_1\subseteq{F_2}$, то $F_2$ называется расширением поля $F_1$.

Примеры:
- $R$ - расширение поля $Q$
- $C$ - расширение поля $R$

Многочлен $x^2+1$ над $R$ не имеет корней. $R\subseteq{C}$. В поле $C$ многочлен $x^2+1$ имеет корни.

Пусть многочлен $f(x)$ над полем $F$ не имеет корней. Подберём расширение поля $F$, в котором $f(x)$ имеет корни.

Расширение будем искать в случае, когда $f(x)$ неприводим, т.к. если $f(x)=g(x)*h(x)$, то $f(\alpha)=0\iff{g(\alpha)=0}$ или $h(\alpha)=0$, т.е. проблема отыскания корня $f(x)$ сводится к проблеме отыскания корня $g(x)$ или $h(x)$.

Рассмотрим $F\'=F[x]/(f(x))$ - кольцо вычетов по модулю $f(x)$.

Так как $f(x)$ неприводим, то $F\'$ - поле. Элементами $F\'$ являются классы вычетов, которые образованы остатками от деления на $f(x)$.

Пусть $f(x)=a_m*x^m+a_{m-1}*x^{m-1}+...+a_1*x+a_0$ над $F$.

Над $F\'$ ему соответствует многочлен $f(y)=\overline{a_m}*y^m+\overline{a_{m-1}}*y^{m-1}+...+\overline{a_1}*y+\overline{a_0}$, где $\overline{a_i}$ - класс, содержащий $a_i$

Заметим, что класс в $i$-й степени: 
->$\overline{t}^i=[t+(f(x))]^i=\underbrace{[t+(f(x))]*...*[t+(f(x))]}_{i \text{ раз}}=t^i+(f(x))\space\forall\overline{t}\in{F\'}$<-

Тогда:
->$\begin{gathered}f(\overline{x})=\overline{a_m}*\overline{x}^m+\overline{a_{m-1}}*\overline{x}^{m-1}+...+\overline{a_1}*\overline{x}+\overline{a_0}=\\\overline{a_m}*\overline{x^m}+\overline{a_{m-1}}*\overline{x^{m-1}}+...+\overline{a_1}*\overline{x}+\overline{a_0}=\\\overline{a_m*x^m}+\overline{a_{m-1}*x^{m-1}}+...+\overline{a_1*x}+\overline{a_0}=\\\overline{a_m*x^m+a_{m-1}*x^{m-1}+...+a_1*x+a_0}=\overline{f(x)}=\overline{0}\\\implies{\overline{x}}-\text{ корень }f(y)\end{gathered}$<-

Таким образом, $f(x)$ имеет корни в поле $F\'$.

Пусть $F=Q$ - поле рациональных чисел. Рассмотрим многочлен $f(x)=x^2-2$.

Покажем, что $f(x)$ не имеет корней в $Q$:

Предположим противное. Пусть $\alpha$ - корень $f(x)$ в $Q$. Тогда $f(\alpha)=\alpha^2-2=0$ или $\alpha^2=2$. 

Т.к. $\alpha\in{Q}$, то $\alpha=\frac{p}{q},p,q\in{Z},q\not=0$. Можно считать, что $(p,q)=1$ (т.к. дробь можно сократить).

->$\begin{gathered}\alpha^2=2\implies{\frac{p^2}{q^2}=2}\implies{p^2}=2q^2\implies{2|p^2}\implies{2|p}\implies{p=2u}\implies\\{4u^2}=2q^2\implies2u^2=q^2\implies{2|q^2}\implies{2|q}\implies(p,q)=2\end{gathered}$ <-
Что противоречит тому, что $(p,q)=1$. ∎

Итак, $f(x)$ - многочлен $2$-й степени и не имеет корней в $Q$. Значит $f(x)$ неприводим. Построим поле $F\'$, в котором содержится $F$ и в котором многочлен $f(x)$ имеет корень.

Проделаем всё по шагам:

*Дано:* $F=Q,f(x)=x^2-2$ не имеет рациональных корней. Построить поле $F\'$, в котором $f(x)$ имеет корни.

1) Строим кольцо многочленов над $F$, т.е. $F[x]=\lbrace{a_m*x^m+a_{m-1}*x^{m-1}+...+a_1*x+a_0|a_i\in{Q},i=\overline{0,m}}\rbrace$. 

	Например $0,1,\frac{5}{6},x,x+\frac{1}{2},x^2,x^3+7,...\in{F[x]}$
2) Строим кольцо вычетов по модулю $f(x)$, для этого каждый элемент из $F[x]$ делим с остатком на $f(x)$.

	$F[x]/(f(x))=\lbrace{a+b*x+(x^2-2)|a,b\in{Q}}\rbrace$
  
	Например $0\to\lbrace{0,x^2-2,2*x^2-4,x^4-4,...}\rbrace,1\to\lbrace{1,x^2-1,2*x^2-3,x^4-3,...}\rbrace,...\in{F[x]/(f(x))}$
  
	Т.к. $f(x)$ неприводим, то $F\'=F[x]/(f(x))$ - поле.
3) В поле $F\'$ выполняется $f(x)=[x^2-2]=[0]$, т.е. $x$ - корень $f(x)$ в $F\'$

	Введем обозначение $x=\sqrt{2}$
  
	Получили поле $F\'=Q(\sqrt{2})$, элементы которого имеют вид $a+b\sqrt{2},a.b\in{Q}$
  
*Дано:* $F\'=Q(\sqrt{2}),g(x)=x^2-3$ не имеет корней в $F\'$. Построить поле $F\'\'$, в котором $g(x)$ имеет корни.

1) Строим кольцо многочленов над $F\'$, т.е. $F\'[x]=\lbrace{a_m*x^m+a_{m-1}*x^{m-1}+...+a_1*x+a_0|a_i\in{F\'},i=\overline{0,m}}\rbrace$. 

	Например $0,1,\frac{5}{6},\sqrt{2},x,x+\frac{\sqrt{2}}{2},x^2,x^3+7,...\in{F\'[x]}$
2) Строим кольцо вычетов по модулю $g(x)$.

	$F\'[x]/(g(x))=\lbrace{a+b*x+(x^2-3)|a,b\in{F\'}}\rbrace$
  
	Например $0+0*\sqrt{2}\to\lbrace{0,x^2-3,2*x^2-6,x^4-9,...}\rbrace,1+0*\sqrt{2}\to\lbrace{1,x^2-2,2*x^2-5,x^4-8,...}\rbrace,...\in{F\'[x]/(g(x))}$
  
	Т.к. $g(x)$ неприводим, то $F\'\'=F\'[x]/(g(x))$ - поле.
3) В поле $F\'\'$ выполняется $g(x)=[x^2-3]=[0]$, т.е. $x$ - корень $g(x)$ в $F\'\'$

	Введем обозначение $x=\sqrt{3}$
  
	Получили поле $F\'\'=Q(\sqrt{2},\sqrt{3})$, элементы которого имеют вид $a+b\sqrt{3},a.b\in{Q(\sqrt{2})}$
	
Опишем общую схему построения расширений поля $F$:

1) Находим неприводимый над $F$ многочлен $f(x)$.

2) Рассматриваем кольцо $F[x]$.

3) Строим в этом кольце идеал $I=(f(x))$. (все многочлены которого без остатка делятся на $f(x)$).

4) Рассматриваем фактор-кольцо (поле) $F[x]/I$. Элементами этого поля являются классы неразличимых многочленов (т.е. те разность которых $\in{I}$ или без остатка делящиеся на $f(x)$)

5) Для многочлена $f(x)$ над $F$ рассматриваем, соответствующий ему $f(y)$ над новым полем.

6) $f(x)=0$ - класс, содержащий многочлен $0$.

Итак, имеем:
- поле $F$
- неприводимый над $F$ многочлен $f(x)$
- поле $F\'\supset{F}$, в котором $f(x)$ имеет корень

Если $f(x)=a_0+a_1*x+...+a_m*x^m,a_i\in{F}$, то элементами $F\'$ являются многочлены (представители классов) $r(x)=b_0+b_1*x+...+b_{m-1}*x^{m-1},b_i\in{F}$

Пусть есть многочлен $g(y)=c_0+c_1*y+...+c_n*y^n$, неприводимый над $F\'$.

Повторив рассуждения можно построить поле $F\'\'$, которое содержит в себе поле $F\'$, а значит и $F$ ($F\'\'\supset{F\'}\supset{F}$), в котором $g(y)$ будет иметь корни.

Элементами поля $F\'\'$ являются многочлены (представители классов) $w(y)=d_0+d_1*y+...+d_{n-1}*y^{n-1},d_i\in{F\'}$

Так как $d_i\in{F\'}$, то $d_i$ - многочлен от $x$. Подставим эти многочлены в $w(y)$ и получим многочлены степени не выше $(m-1)*(n-1)$ от переменных $x$ и $y$ и с коэффициентами из поля $F$.'
        ]);

        //        $questions = [
//
//        ];
//        $this->create_questions($lesson, $questions);

        $course = Course::Create([
            'name' => 'Дифференциальные уравнения',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'diff_eq.jpg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Уравнения первого порядка', 'Линейные уравнения n-го порядка'];
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
            //'video' => 'hello.mov'
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
            'text' => '**Задачей Коши** называют задачу нахождения решения решения $y=y(x)$ уравнения $y\'=f(x,y)$, удовлетворяющего начальному условию $y(x_0)=y_0$

Геометрически: ищем интегральную кривую, проходящую через заданную точку $M_0$ плоскости $xOy$

Функция $f(x,y)$, определенная в некоторой области $D$ удовлетворяет в $D$ **условию Липшица**, если существует такая постоянная $L$ (постоянная Липшица), что $\forall\space{y_1,y_2}\in{D},\forall\space{x}$ справедливо неравенство $|f(x,y_2)-f(x,y_1)|\leq{L}|y_2-y_1|$.

★ Существование в области $D$ ограниченной производной $\frac{df}{dy}$ является достаточным условием для того, чтобы функция $f(x,y)$ в $D$ удовлетворяла условию Липшица. (Обратное неверно).

Рассмотрим задачу Коши: $\quad\begin{cases}y\'=f(x,y)\\\y(x_0)=y_0\end{cases}\quad{(1)}$

**Лемма (Об интегральном уравнении)**. Функция $y(x)$ является решением уравнения 
->$y(x)=y_0+\int_{x_0}^{x}{f(t,y(t))dt}\quad{(2)}$<-
тогда и только тогда, когда она является решением задачи (1).

*Доказательство.* 
$\impliedby$ Путь $y(x)$ - решение задачи (1), тода оно удовлетворяет тождеству $y\'=f(x,y(x))$. Проинтегрировав тождество получим $y(x)-y(x_0)=\int_{x_0}^{x}{f(t,y(t))dt}$. y(x) непрерывна и так как по условию $y(x_0)=y_0$, то y(x) - решение уравнения (2).
$\implies$ Пусть $y(x)$ - решение (2).  $f(x,y)$ непрерывна по условию, а $y(x)$ непрерывна по определению решения. Продифференцировав (2) получим $y\'=f(x,y(x))$, а так как $y(x_0)=y_0$, то $y(x)$ - решение (1).

**Теорема (Существования и единственности решения задачи Коши или теорема Пикара)**. Пусть фунцкия $f(x,y)$ определена и непрерывна по совокупности переменных и удовлетворяет условию Липшица по $y$ в прямоугольнике $D=\lbrace{(x,y):|x-x_0|\leq{a},|y-y_0|\leq{b}}\rbrace$. Тогда существует единственное решение задачи Коши (1), определенное на интервале $(x_0-h,x_0+h)$, где $h=min(a,\frac{b}{M}),\space{M}=max_D(f(x,y))$.

*Доказательство.* **Метод последовательных приближений.**  Пусть
->$y_1(x)=y_0+\int_{x_0}^{x}{f(t,y_0)dt},\quad{y_2}(x)=y_0+\int_{x_0}^{x}{f(t,y_1(t))dt}$.<-
По индукции определим последовательность функций

->$y_k{x}=y_0+\int_{x_0}^x{f(t,y_{k-1}(t))dt)}$<-

Допустим эта последовательность сходится к $\overline{y}(x)$ и разрешен предельный переход под знаком интеграла функции $f$. 

Тогда при $k\to{}\infty\quad\overline{y_k}(x)=y_0+\int_{x_0}^x{f(t,\overline{y}(t))dt}$ (3), значит $\overline{y}$ - решение уравнения (2), а следовательно и задачи Коши (1).

Теперь докажем, что все функции последовательности $y_k(x)$ определены и непрерывны в интервале $(x_0-h,x_0+h)$ и не выходят за $D$ 

Индукция по k.
База: k=1. Функция $y_1(x)$ непрерывна при $|x-x_0\leq{a}|$, т.к. $f(x,y)$ непрерывна, а интеграл с переменным верхним пределом есть непрерывная функция на этом отрезке. Если $|x-x_0|\leq{h}$, то для точки $(x,y)\in{D}$ имеем: $|y_1(x)-y_0|=|\int_{x_0}^x{f(t,y_0)dt}|\leq|\int_{x_0}^x|f(t,y_0)|dt|\leq{M}|x-x_0|\leq{b}$.
Шаг: Пусть утверждение справедливо для $y_{n-1}(x)$.

Тогда $|y_n(x)-y_0|\leq|\int_{x_0}^x|f(t,y_{n-1}(t))|dt|$. А т.к. $(t,y_{n-1}(t))\in{D}$, то $|f(t,y_{n-1}(t)|\leq{M}$, следовательно $|y_n(x)-y_0|\leq{M}|x-x_0|\leq{b}$

Докажем что последовательность функций $\lbrace{y_n(x)}\rbrace_{n=1}^{\infty}$ сходится равномерно к $\overline{y}(x)$ на отрезке $|x-x_0|\leq{h}$.

Построим ряд $y_0(x)+(y_1(x)-y_0(x))+...+(y_n(x)-y_{n-1}(x))+...$ (4)

Докажем что этот ряд сходится равномерно. Нужно доказать что $\forall{n}\in{N}\quad|y_n(x)-y_{n-1}(x)|\leq\frac{ML^{n-1}|x-x_0|^n}{n!}\leq\frac{ML^{n-1}h^n}{n!}$. Индукция по $n$.

База: n=1, тогда $|y_1(x)-y_0(x)|\leq{M}|x-x_0|$.

Шаг: Пусть для $n=m$ неравенство доказано, докажем его для $n=m+1$:
->$\begin{aligned}&|y_{m+1}(x)-y_m(x)|\\\&=|\int_{x_0}^x|f(t,y_m(t)-f(t,y_{m-1}(t)|dt|\\\&\leq|\int_{x_0}^x{L|y_m(t)-y_{m-1}(t)|dt}|\\\&\leq{L}\int_{x_0}^x\frac{ML^{m-1}|x-x_0|^k}{m!}\\\&=\frac{ML^k|x-x_0|^{k+1}}{(m+1)!}\end{aligned}$<-

Т.к. $|x-x_0\leq{h}|$, то $|y_n(x)-y_{n-1}(x)|\leq\frac{ML^{n-1}h^n}{n!}$.

Ряд $\sum{\frac{L^{n-1}h^n}{n!}}$ сходится по признаку Даламбера.

Таким образом ряд (4) сходится равномерно по признаку Вейерштрасса и его сумма $\overline{y}(x)$ является непрерывной функцией.

Теперь докажем, что $\overline{y}(x)$ - решение задачи Коши (1).

Используя условие Липшица и равномерную сходимость последовательности  $\lbrace{y_n(x)}\rbrace_{n=1}^{\infty}$, получим, что $\forall\space\varepsilon>0\space\exists{N}\in{N}:\forall{n\geq{N}}$ выполняется
->$\begin{aligned}&|\int_{x_0}^x{f(t,y(t))dt-\int_{x_0}^x{f(t,\overline{y}(t))dt}}|\\\&\leq\int_{x_0}^x|f(t,y_n(t))-f(t,\overline{y}(t))|dt\\\&\leq{L}\int_{x_0}^x|y_n(t)-\overline{y}(t)|dt\leq{L}\varepsilon{h}\end{aligned}$<-

Таким образом, обоснована законность предельного перехода под знаком интеграла, откуда следует, что $\overline{y}(x)$ - решение уравнения уравнения (3), а следовательно и задачи Коши (1).

Докажем единственность решения задачи Коши (1).

Пусть $y_1(x),y_2(x)$ - решения задачи Коши (1). Тогда

->$y_1(x)=y_0+\int_{x_0}^x{f(t,y_1(t))dt},\quad{y_2}(x)=y_0+\int_{x_0}^x{f(t,y_2(t))dt}$<-

Получим оценку для их разности.

$\begin{aligned}0\leq|y_1(x)-y_2(x)|\\\&\leq|\int_{x_0}^x|f(t,y_1(t))-f(t,y_2(t))|dt|\\\&\leq{L}|\int_{x_0}^x|y_1(t)-y_2(t)|dt|\\\&\leq{L}h	\displaystyle\sup_{|x-x_0|\leq{h}}|y_1(x)-y_2(x)|\leq{L}h^2M\to\infty\end{aligned}$

Следовательно $(1-Lh)\displaystyle\sup_{|x-x_0|\leq{h}}|y_1(x)-y_2(x)|\leq0$

А при $h\leq\frac{1}{L}\quad\displaystyle\sup_{|x-x_0|\leq{h}}|y_1(x)-y_2(x)|\leq{0}$.

Таким образом $y_1(x)\equiv{y_2(x)}$. ∎
',
        ]);

        $questions = [
            [
                'q' => 'Выберите условия теоремы существования и единственности решения задачи Коши для функции f(x,y), определенной в области D',
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

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Метод изоклин',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '',
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    '',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнения с разделяющимися переменными и приводящие к ним',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Дифференциальное уравнение вида $\varphi(x)dx=\psi(y)dy$, называется **уравнением с разделенными переменными**.

Решение: $\int\varphi(x)dx=\int\psi(y)dy+C$

★ Особых решений такое уравнение не имеет.

★  Решение задачи Коши для уравнения (1) находится по формуле 
->$\int_{x_0}^x\varphi(x)dx=\int_{y_0}^y\psi(y)dy+C$,<-
если $\varphi(x_0)$ и  $\psi(y_0)$ не равны 0 одновременно, при этом оно является единственным. Если же $\varphi(x_0)=\psi(y_0)=0$, то решение задачи Коши может не сущевствовать или быть не единственным.

Дифференциальное уравнение вида $\varphi_1(x)\psi_1(y)dx=\varphi_2(x)\psi_2(y)dy$, называется **уравнением с разделяющимися переменными**.

Для решения такого уравнения разделим обе его части на произведение $\varphi_1(x)\psi_2(y)$. Тогда получим уравнение с разделенными переменными:

->$\frac{\varphi_2(x)}{\varphi_1(x)}dx=\frac{\psi_1(y)}{\psi_2(y)}dy$<-

Найдем его общий интеграл: $\int_{x_0}^x\frac{\varphi_2(x)}{\varphi_1(x)}dx=\int_{y_0}^y\frac{\psi_1(y)}{\psi_2(y)}dy+C$

Теперь вспомним, что мы делили на $\varphi_1(x)\psi_2(y)$, значит мы могли потерять частные решения, обращающие это произведение в 0.

Таким образом, частные решения получаемые при $\varphi_1(x)=0$ или $\psi_2(y)=0$ могут оказаться особыми. Если ни при каком значении произвольной постоянной $C$ такие решения не входят в общее решение, то включаем их в решение, в качестве особых.

**Утверждение**. Дифференциальное уравнение вида $\frac{dy}{dx}=f(ax+by+c),\space{a,b,c}-const$,  заменой $z=ax+by+c$ преобразуется в уравнение с разделяющимися переменными.',
            'examples' => '1) Проинтегрировать уравнение $(1+y^2)dy=(1+x^2)dx$.

Имеем уравнение с разделенными переменными, тогда получим решение проинтегрировав обе части уравнения.

Ответ: $y+\frac{1}{3}y^3=x+\frac{1}{3}x^3+C$

2) Решить уравнение $e^y(1+x^2)dy-2x(1+e^y)dx=0$

Делим уравнение на $(1+x^2)(1+e^y)$

★ Заметим, что $(1+x^2)(1+e^y)>0\space\forall{x,y}$, поэтому проверки на особые решения проводить не нужно.

Получаем уравнение с разделенными переменными: $\frac{e^ydy}{1+e^y}=\frac{2xdx}{1+x^2}$.

Проинтегрируем обе его части:

->$\begin{aligned}&\int\frac{e^ydy}{1+e^y}=\int\frac{2xdx}{1+x^2}\implies\\\&\int\frac{d(1+e^y)}{1+e^y}=\int\frac{d(1+x^2)}{1+x^2}\implies\\\&ln(1+e^y)=ln(1+x^2)+C\implies\\\&1+e^y=\overline{C}(1+x^2),\overline{C}=e^C\end{aligned}$<-

Так нашли общее решение дифференциального уравнения.

Ответ: $1+e^y=\overline{C}(1+x^2)$

3) Решить задачу Коши $y\'+sin(x-y)=sin(x+y),\space{y}|_{x=\pi}=\frac{\pi}{2}$

Сперва преобразуем уравнение, применив тригонометрические тождества: 
->$y\'=2cos(x)sin(y)$<-

Теперь умножим уравнение на $\frac{dx}{sin(y)}$:
->$\frac{dy}{sin(y)}=2cos(x)dx$<-

Далее, интегрируем обе части уравнения:
->$\int{\frac{dy}{sin(y)}}=\begin{Bmatrix}
   \tg{\frac{y}{2}}=t;y=2\arctg{t};dy=\frac{2}{1+t^2}dt
\end{Bmatrix}=\int\frac{dt}{t}=\ln{t}+C_1=\ln{\tg{\frac{y}{2}}}+C_1$<-
->$\int{2cos(x)dx=2sin(x)+C_2}$<-

Получаем общее решение: $\ln{\tg{\frac{y}{2}}}=2\sin{x}+C_1$

Приведем его к виду: $\tg{\frac{y}{2}}=Ce^{2\sin{x}}$

Вспомним, что мы делили на $\sin{y}$, поэтому могут быть особые решения $y=\pi{n}$, но они входят в общее решение при $C=0$, поэтому их в ответ не включаем.

Далее применяем начальные условия задачи Коши и находим $C$:
->$\tg{\frac{\pi}{4}}=Ce^{2\sin{\pi}}\implies{C}=1$<-

Ответ: $\tg{\frac{y}{2}}=e^{2sin(x)}$ 

4) Проинтегрировать уравнение $y\'=ax+by+c$.

Сделаем замену $z=ax+by+c$, тогда $y=\frac{z-ax-c}{b},\quad{y\'}=\frac{z\'-a}{b}$

Получаем уравнение: $z\'=bz+a$.

Умножаем на $\frac{dx}{bz+a}$.

Далее интегрируем уравнение $\frac{dz}{bz+a}=dx$ и получаем $\frac{\ln(bz+a)}{b}=x+\overline{C}$ или $bz=Ce^{bx}-a$.

Мы делили на $bz+a$, $z=-\frac{a}{b}$ входит в общее решение при $C=0$, поэтому это решение не будет особым.

Возвращаясь к старым переменным, получим ответ: $b(ax+by+c)=Ce^{bx}-a$.'
        ]);

        $questions = [
            [
                'q' => 'Может ли иметь особые решения уравнение с разделяющимися переменными?',
                't' => 'test_one',
                'a' => [
                    'да',
                    'нет'
                ],
                'c' => [true, false]
            ],
            [
                'q' => 'Может ли иметь особые решения уравнение с разделенными переменными?',
                't' => 'test_one',
                'a' => [
                    'да',
                    'нет'
                ],
                'c' => [false, true]
            ],
            [
                'q' => 'Выберите уравнения с разделенными переменными',
                'a' => [
                    '$(1+y^2)dx+(1+x^2)dy=0$',
                    '$(1+x^2)dx+(1+y^2)dy=0$',
                    '$x\sqrt[3]{1-y^2}dx+y\sqrt[3]{1-x^2}dy=0$',
                    '$yln(y)dx+xdy=0$',
                    '$y\'sin(x)-ycos(x)=0$',
                    '$y\'+xy+1=0$',
                    '$y\'+sin(x-y)=sin(x+y)$',
                    '$e^{-y}(1+y\')=1$',
                    '$sh(x)dx=ch(y)dy$',
                    '$2xsin(\frac{ln(x)}{x})dx+5ycos(\frac{y}{e^y})=0$'
                ],
                'c' => [false, true, false, false, false, false, false, false, true, true]
            ],
            [
                'q' => 'Выберите уравнения с разделяющимися переменными',
                'a' => [
                    '$(1+y^2)dx+(1+x^2)dy=0$',
                    '$(1+x^2)dx+(1+y^2)dy=0$',
                    '$x\sqrt[3]{1-y^2}dx+y\sqrt[3]{1-x^2}dy=0$',
                    '$yln(y)dx+xdy=0$',
                    '$y\'sin(x)-ycos(x)=0$',
                    '$y\'+xy+1=0$',
                    '$y\'+sin(x-y)=sin(x+y)$',
                    '$e^{-y}(1+y\')=1$',
                    '$sh(x)dx=ch(y)dy$',
                    '$2xsin(\frac{ln(x)}{x})dx+5ycos(\frac{y}{e^y})=0$'
                ],
                'c' => [true, false, true, true, true, false, true, true, false, false]
            ],
            [
                'q' => 'Выберите уравнения, приводимые к уравнениям с разделяющимися переменными',
                'a' => [
                    '$(1+y^2)dx+(1+x^2)dy=0$',
                    '$(1+x^2)dx+(1+y^2)dy=0$',
                    '$xy\'=5(x+xy)+x^2$',
                    '$x\sqrt[3]{1-y^2}dx+y\sqrt[3]{1-x^2}dy=0$',
                    '$y\'=\sqrt{4x+2y-1}$',
                    '$yln(y)dx+xdy=0$',
                    '$y\'sin(x)-ycos(x)=0$',
                    '$y\'+xy+1=0$',
                    '$y\'+sin(x-y)=sin(x+y)$',
                    '$dy=(5x+3y+1)dx$'
                ],
                'c' => [false, false, true, false, true, false, false, false, false, true]
            ],
            [
                'q' => 'Как привести уравнение $yln(y)dx+xdy=0$ к уравнению с разделенными переменными?',
                'a' => [
                    'Разделить на $xy$',
                    'Разделить на $xln(y)$',
                    'Разделить на $yln(y)$',
                    'Разделить на $dxdy$',
                    'Разделить на $xdy$',
                ],
                'c' => [true, true, false, false, false]
            ],
            [
                'q' => 'Будет ли решение $y=1$ уравнения $x\sqrt{1-y^2}dx+y\sqrt{1-x^2}dy=0$ особым, если его общее решение записано в виде $\sqrt{1-x^2}+\sqrt{1-y^2}=C$',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [true, false]
            ],
            [
                'q' => 'Будет ли решение $y=0$ уравнения $(xy^2+y^2)dx+(x^2-yx^2)dy=0$ особым, если его общее решение записано в виде $\frac{x}{y}=Ce^{\frac{1}{x}+\frac{1}{y}}$',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Однородные уравнения',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Функция $f(x,y)$ называется **однородной функцией** степени $m$, если выполняется $f(tx,ty)=t^mf(x,y)$

Например $f(x,y)=x^3+y^3-x^2y$ - однородная функция степени 3, т.к.
->$f(tx,ty)=t^3(x^3+y^3-x^2y)=t^3f(x,y)$<-

А $f(x,y)=\frac{x^3+y^3}{x^3-y^3}$ - однородная функция степени 0, т.к.
->$f(tx,ty)=\frac{t^3(x^3+y^3)}{t^3(x^3-y^3)}=\frac{x^3+y^3}{x^3-y^3}=f(x,y)$<-

### Однородные дифференциальные уравнения

Дифференциальное уравнение вида $\varphi(x,y)dx+\psi(x,y)dy$, где $\varphi(x,y),\psi(x,y)$ - однородные функции одной и той же степени, называется **однородным**. 

Дифференциальное уравнение вида $y\'=f(x,y)dy$, где $f(x,y)$ - однородная функция нулевой степени, называется **однородным**. 

**Утверждение**. Всякое однородное уравнение можно представить в виде $y\'=\lambda(\frac{y}{x})$.

*Доказательство:*  Пусть уравнение $\varphi(x,y)dx+\psi(x,y)dy=0$ - однородное степени $m$.

Поделим уравнение на $\psi(x,y)dx$:
->$\frac{dy}{dx}=-\frac{\varphi(x,y)}{\psi(x,y)}$<-

Теперь вспомним, что функции $\varphi(x,y),\psi(x,y)$ - однородные степени $m$:
->$\frac{dy}{dx}=-\frac{x^m\varphi(1,y/x)}{x^m\psi(1,y/x)}$<-

Таким образом $y\'=\lambda(\frac{y}{x})$. ∎

★ Из $y\'=\lambda(\frac{y}{x})$ видно что в точке $(0,0)$ поле направлений не задано. Поэтому данная точка является особой точкой однородного уравнения.

**Утверждение**. Заменой $z=\frac{y}{x}$ однородное дифференциальное уравнение приводится к уравнению с разделяющимися переменными.

*Доказательство:* Пусть уравнение $\varphi(x,y)dx+\psi(x,y)dy=0$ - однородное степени $m$. Сделаем замену $y=zx$, тогда 
->$\varphi(x,zx)dx+\psi(x,zx)(zdx+xdz)=0$<-
->$x^m\varphi(1,z)dx+x^m\psi(1,z)(zdx+xdz)=0$<-
->$(\varphi(1,z)+z\psi(1,z))dx+x\psi(1,z)dz$=0<-

Последнее уравнение является уравнением с разделяющимися переменными. ∎

Теперь найдем решение полученного уравнения:

->$\frac{\psi(1,z)dz}{\varphi(1,z)+z\psi(1,z)}=-\frac{dx}{x}\implies$<-
->$\lambda(z)=lnx+\overline{C}$, где $\lambda(z)=\int{\frac{\psi(1,z)dz}{\varphi(1,z)+z\psi(1,z)}}$<-
->$x=Ce^{\lambda(z)}$<-
->$x=Ce^{\lambda(\frac{y}{x})}$<-

Теперь найдем особые решения из уравнения $x(\varphi(1,z)+z\psi(1,z))=0$

$x=0$ входит в общее решение при $C=0$.

Равенство $\varphi(1,z)+z\psi(1,z)=0$ может привести к решению, которое может быть как частным, так и особым. 

Других особых решений однородное уравнение не имеет.

### Обобщенные однородные дифференциальные уравнения

Уравнение вида $\varphi(x,y)dx+\psi(x,y)dy=0$, не являющееся однородным, называют **обобщенным однородным** дифференциальным уравнением, если существует такое число $k$, что при замене $y=z^k$, где $z=z(x)$ - новая неизвестная функция уравнение становится однородным.

Это может иметь место только в случае, когда в уравнении все члены оказываются одинакового измерения, если предположить, что $x$ - величина 1 измерения, $y$ - величина $k$-го измерения, $y\'$ - величина $(k-1)-$го измерения.',
            'examples' => '1) Проинтегрировать уравнение $xy\'=y+\sqrt{y^2-x^2}$.

Делаем замену $z=\frac{y}{x}$, тогда $y=zx$ и $dy=zdx+xdz$

Уравнение примет вид: $\frac{x(zdx+xdz)}{dx}=zx+\sqrt{z^2x^2-x^2}$

Разделим уравнение на $x$ и сгруппируем слагаемые при $dx$ и $dz$, получим:
->$\sqrt{z^2-1}dx=xdz$<-

Теперь решим полученное уравнение с раделяющимися переменными:

$\frac{dx}{x}=\frac{dz}{\sqrt{z^2-1}}\implies{lnx=}ln|z+\sqrt{z^2-1}|+\overline{C}\implies{x}=C(z+\sqrt{z^2-1})$

Подставим $z=\frac{y}{x}$, получим общее решение $x=C(\frac{y}{x}+\sqrt{(\frac{y}{x})^2-1})$

Теперь вспомним, что мы делили на $x\sqrt{z^2-1}$, поэтому могли потерять решения, которые обращают в нуль это произведение.

$x=0$ входит в общее решение

$z=\pm{1}$, т.е. $\frac{y}{x}=\pm{1}\iff{y}=\pm{x}$ - особые решения (Непосредственной проверкой убедимся в этом) 

Ответ: $x=C(\frac{y}{x}+\sqrt{(\frac{y}{x})^2-1}),\quad{y}=\pm{x}$

2) Решить уравнение $4y^6+x^3=6xy^5y\'$.

Данное уравнение является обобщенным однородным, так как полагая что $x,y,y\'$ - величины $1,k,k-1$ измерений соответственно и решая равенства $6k=3=1+5k+k-1$, получим  $k=\frac{1}{2}$

Теперь делаем замену $y=z^{\frac{1}{2}}$ и получаем однородное уравнение:
->$4z^3+x^3=3xz^2z\'$<-
Снова делаем замену $z=xt$, тогда  $dz=xdt+tdx$ и уравнение примет вид:
$(4t^3x^3+x^3)dx=3t^2x^3(tdx+xdt)$

Разделяем переменные и решаем уравнение: 
->$\frac{3t^2dt}{t^3+1}=\frac{dx}{x}$<-
->$\int{\frac{d(t^3+1)}{t^3+1}}=\int{\frac{dx}{x}}$<-
->$ln(t^3+1)=lnx+\overline{C}$<-
->$t^3+1=Cx$<-
->$t=\frac{z}{x}\implies\frac{z^3}{x^3}+1=Cx$<-
->$z=y^2\implies{}y^6+x^3=Cx^4$<-

Так, получили общее решение. Теперь проверяем возможные особые решения: $x=0$ и $t^3=-1\implies{}z^3=-x^3\implies{}y^6=-x^3$.

$x=0$ не является решением исходного уравнения.
$y^6=-x^3$ - частное решение при $C=0$.

Таким образом особых решений уравнение не имеет.

Ответ: $y^6+x^3=Cx^4$'
        ]);

        $questions = [
            [
                'q' => 'Выберите однородные функции 2 степени',
                'a' => [
                    '$f(x,y)=x^2+y^2-xy$',
                    '$f(x,y)=x+y-xy$',
                    '$f(x,y)=x^3+y^3-x^2y$',
                    '$f(x,y)=x^2sin(y)+y^2cos(x)$',
                    '$f(x,y)=xy+x^2$',
                    '$f(x,y)=\frac{x^4+y^4}{x^2+y^2}$',
                    '$f(x,y)=\frac{x^2y+x^3}{y}$',
                    '$f(x,y,z)=\frac{x^3+xyz+z^3}{xy}$',
                ],
                'c' => [true, false, false, false, true, true, true, false]
            ],
            [
                'q' => 'Выберите однородные дифференциальные уравнения',
                'a' => [
                    '$xy+y^2-x^2y\'=0$',
                    '$x+y-xy$',
                    '$xy\'=y(lny-lnx)$',
                    '$(4x-3y)dx+(2y-3x)dy=0$',
                    '$xy\'=\sqrt{x^2-y^2}+y$',
                    '$y\'=\frac{x^4+y^4}{x^2+y^2}$',
                    '$y\'=\frac{x^2y+x^3}{y^3}$',
                    '$y\'=x^2sin^2(x)+2xysin(x)cos(x)+y^2cos^2(x)$',
                ],
                'c' => [true, false, true, true, true, false, true, false]
            ],
            [
                'q' => 'Какой тип, по ожиданиям (если не учитывать конкретные частные случаи), будет иметь уравнение, полученное заменой $z=\frac{y}{x}$ из однородного дифференциального уравнения',
                't' => 'test_one',
                'a' => [
                    'Уравнение с разделенными переменными',
                    'Линейное уравнение',
                    'Уравнение в полных дифференциалах',
                    'Уравнение с разделяющимися переменными',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Какое измерение имеет однородная функция $f(x,y)$, если $y\'=f(x,y)$ есть однородное дифференциальное уравнение? (В качестве ответа введите число)',
                't' => 'task',
                'a' => '0'
            ],
            [
                'q' => 'Выберите обобщенные однородные дифференциальные уравнения',
                'a' => [
                    '$(x+y+1)dx+(2x+2y-1)dy=0$',
                    '$(x^2y^2-1)dy+2xy^3dx=0$',
                    '$y(1+\sqrt{x^2y^4+1})dx+2xdy=0$',
                    '$y(y+\sqrt{x^2y^4+1})dx+2xdy=0$',
                    '$y(1+\sqrt{x^2y^4+1})dx+2x^2dy=0$',
                    '$4y^6+x^3=6xy^5y\'$',
                    '$(x+y^3)dx+3(y^3-x)y^2dy=0$',
                    '$(x+y^3)dx+3(y^4-x)y^2dy=0$'
                ],
                'c' => [false, true, true, false, false, true, true, false]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнения, приводимые к однородным',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Уравнение вида 
->$(a_1x+b_1y+c_1)dx+(a_2x+b_2y+c_2)dy=0\quad{(1)}$<-
->$(\frac{dy}{dx}=f(\frac{a_1x+b_1y+c_1}{a_2x+b_2y+c_2}))$<-
где ${a,b,c,a_1,b_1,c_1-const}$ называется уравнением, приводимым к однородному.

Если $c=c_1$, то уравнение является однородным.

Пусть теперь хотя бы одно из чисел $c,c_1$ не равно 0.

Сделаем в уравнении (1) замену
->$\begin{cases}x=\varepsilon+\alpha\\\y=\eta+\beta\end{cases}$<-
где $\varepsilon,\eta$ - новые независимые переменные, $\alpha,\beta$ - параметры.

Попытаемся оределить $\alpha,\beta$, так чтобы уравнение стало однородным.

$(a_1\varepsilon+a_1\alpha+b_1\eta+b_1\beta+c_1)d\varepsilon+(a_2\varepsilon+a_2\alpha+b_2\eta+b_2\beta+c_2)d\eta\quad(2)$

Подберем $\alpha,\beta$ так, чтобы система $\begin{cases}a_1\alpha+b_1\beta+c_1=0\\\a_2\alpha+b_2\beta+c_2=0\quad\end{cases}$ имела решение.

Возможны 3 случая:

1) $\begin{vmatrix}
   a_1 & b_1 \\\
   a_2 & b_2
\end{vmatrix}$$\not=0,\quad\frac{a_1}{a_2}\not=\frac{b_1}{b_2}\quad$,  тогда система имеет 1 решение.

$(2)\implies(a_1\varepsilon+b_1\eta)d\varepsilon+(a_2\varepsilon+b_2\eta)d\eta=0$ -  однородное уравнение.

2) $\begin{vmatrix}
   a_1 & b_1 \\\
   a_2 & b_2
\end{vmatrix}=0$$\quad\frac{a_1}{a_2}=\frac{b_1}{b_2}\not=\frac{c_1}{c_2}\quad$,  тогда система не имеет решений.

В этом случае $\frac{a_1}{a_2}=\frac{b_1}{b_2}=k\implies\begin{cases}a_1=ka_2\\\b_1=kb_2\end{cases}$

Подставляем в (1): $k(a_2x+b_2y)dx+c1dx+(a_2x+b_2y+c_2)dy=0$

Делаем замену $z(x)=a_2x+b_2y$, тогда $dy=\frac{dz}{b_2}-\frac{a_2dx}{b_2}$
->$(kz+c_1)dx+(z+c_2)(\frac{dz}{b_2}-\frac{a_2dx}{b_2})=0$<-
->$(kz+c_1-\frac{a_2}{b_2}(z+c_2))dx+\frac{z+c_2}{b_2}dz=0$<-

Получили уравнение с разделяющимися переменными.

3) $\begin{vmatrix}
   a_1 & b_1 \\\
   a_2 & b_2
\end{vmatrix}=0$$\quad\frac{a_1}{a_2}=\frac{b_1}{b_2}=\frac{c_1}{c_2}\quad$,  тогда система имеет $\infty$ много решений.

В этом случае $\frac{a_1}{a_2}=\frac{b_1}{b_2}=\frac{c_1}{c_2}=k\implies\begin{cases}a_1=ka_2\\\b_1=kb_2\\\c_1=kc_2\end{cases}$

Подставляем в (1): $(a_2x+b_2y+c_2)(kdx+dy)=0$

$\Bigg[{\begin{aligned}&a_2x+b_2y+c_2=0\\\&kdx+dy=0\end{aligned}}\quad\Bigg[{\begin{aligned}&a_2x+b_2y+c_2=0\\\&y=-kx+C\end{aligned}}$',
            'examples' => '1) Решить уравнение $(3y-7x+7)dx-(3x-7y-3)dy=0$.

Рассмотрим СЛАУ $\begin{cases}-7\alpha+3\beta+7=0\\\3\alpha-7\beta-3=0\end{cases}$ 

Ее определитель 

->$\Delta=\begin{vmatrix}
   -7 & 3 \\\
   3 & -7
\end{vmatrix}=40$$\not=0$<-
поэтому система имеет единственное решение. Найдем его методом Крамера:

->$\Delta_{\alpha}=\begin{vmatrix}
   -7 & 3 \\\
   3 & -7
\end{vmatrix}=40\implies\alpha=\frac{\Delta_{\alpha}}{\Delta}=1$<-

->$\Delta_{\beta}=\begin{vmatrix}
   -7 & -7 \\\
   3 & 3
\end{vmatrix}=0\implies\beta=\frac{\Delta_{\beta}}{\Delta}=0$<-

Делаем замену $\begin{cases}x=\varepsilon+1\implies{dx=d\varepsilon}\\\y=\eta\implies{dy}=d\eta\end{cases}$

Уравнение примет вид: $(3\eta-7\varepsilon)d\varepsilon-(3\varepsilon-7\eta)d\eta=0$

Делаем замену $\varepsilon=t\eta,$ тогда $d\varepsilon=td\eta+\eta{dt}$ и

->$(3\eta-7t\eta)(td\eta+\eta{dt})-(3t\eta-7\eta)d\eta=0$<-
->$\frac{d\eta}{\eta}=\frac{7t-3}{7(1-t^2)}dt$<-
->$\frac{d\eta}{\eta}=-\frac{d(1-t^2)}{1-t^2}dt-\frac{3}{7}\frac{dt}{1-t^2}$<-
->$ln\eta=-ln(1-t^2)-\frac{3}{14}ln(\frac{1+t}{1-t})+\overline{C}$<-
->$\eta^{14}=C\frac{(1-t)^3}{(1-t^2)^{14}(1+t)^3}$<-
->$\eta^{14}=C\frac{1}{(1-\frac{\varepsilon}{\eta})^{11}(1+\frac{\varepsilon}{\eta})^{17}}$<-
->$1=C\frac{\eta^{14}}{(1-\varepsilon)^{11}(1+\varepsilon)^{17}}$<-
->$y^{14}=Cx^{28}$<-
->$y=Cx^2$<-

2) Решить уравнение $8x+4y+1+(4x+2y+1)y\'=0$

Видим что $\frac{8}{4}=\frac{4}{2}=2$. Делаем замену $4x+2y=z$, тогда $dy=\frac{dz}{2}-2dx$

->$(2z+1)dx+(z+1)(\frac{dz}{2}-2dx)$<-
->$2dx=(z+1)dz$<-
->$2x=\frac{1}{2}z^2+z+\overline{C}$<-
->$4x^2+4xy+y^2+x+y=C$<-

3) Решить уравнение $5x+3y+1+(10x+6y+2)y\'=0$

Видим что $\frac{5}{10}=\frac{3}{6}=\frac{1}{2}=\frac{1}{2}$ (Здесь последняя $\frac{1}{2}=k$), тогда:

->$(5x+3y+1)(1+2y\')=0$<-
Ответ: $\Bigg[{\begin{aligned}&5x+3y+1=0\\\&y=-\frac{1}{2}x+C\end{aligned}}$
'
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    '',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Линейные уравнения первого порядка',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Линейным дифференциальным уравнением первого порядка** называется уравнение вида $y\'+p(x)y=q(x)\quad(1)$, где $p(x),q(x)$ - заданные непрерывные функции.

Если $q(x)=0$, то (1) называется **линейным однородным дифференциальным уравнением**, иначе **линейным неоднородным дифференциальным уравнением**.

Рассмотрим линейное однородное уравнение $y\'+p(x)y=0$ (2)

Это уравнение с разделяющимися переменными. Разделив переменные, получим: 
->$\frac{dy}{y}=-p(x)dx$<-

Проинтегрировав правую и левую части, получим:
->$ln|y|=-\int{p}(x)dx+\overline{C}$<-
->$y=Ce^{-\int{p(x)dx}}$<-

Вспомним, что делили на $y$. Решение $y=0$ является частным решением при $C=0$.

Таким образом общее решение однородного линейного дифференциального уравнения имеет вид: $y=Ce^{-\int{p(x)dx}}$

#### Свойства решений линейных однородных дифференциальных уравнений.

1) Если $y_1(x)$ - решение (2), то $Cy_1(x),\quad{C}-const$, также решение этого уравнения.
	$\blacktriangleright$ Подставим  $Cy_1(x)$ в (2): $Cy_1\'(x)+p(x)Cy_1(x)=0+0=0\implies{Cy}_1(x)$ - решение.
2) Если $y_1(x),y_2(x)$ - решения уравнения (2), то $y_1(x)+y_2(x)$, также его решение.
	$\blacktriangleright$ Подставим  $y_1(x)+y_2(x)$ в (2): $y_1\'(x)+y_2\'(x)+p(x)(y_1(x)+y_2(x))=(y_1\'(x)+py_1(x))+(y_2\'(x)+py_2(x))=0+0=0$
3) Если $y_1(x)$ частное решение (2), то $y(x)=Cy_1(x)$ - общее решение (2)
4) Если $y_1(x),y_2(x)$ - частные решения (2), то общее решение можно записать в виде: $y(x)=y_1(x)+C(y_2(x)-y_1(x))$
5) Решения линейного однородного дифференциального уравнения образуют линейное пространство.

#### Линейные неоднородные дифференциальные уравнения.

**Теорема**. Если $y_1(x)$ - частное решение неоднородного уравнения $(1)$, то общее решение этого уравнения задается формулой $y(x)=y_1(x)+y_0(x)$, где $y_0(x)$ - общее решение соответствующего однородного уравнения.

*Доказательство:* Пусть $y_1(x)$ - частное решение неоднородного уравнения $(1)$, тогда $y_1\'(x)+p(x)y_1(x)-q(x)=0$.

Общее решение данного линейного неоднородного уравнения будем искать в виде  $y(x)=y_1(x)+y_0(x)$, где $y_0(x)$ - неизвестная функция.

Подставляем последнее выражение в уравнение  $(1)$: 
->$\begin{aligned}&y_1\'(x)+y_0\'(x)+p(x)y_1(x)+p(x)y_0(x)=q(x)\iff\\\&(y_1\'(x)+p(x)y_1(x)-q(x))+y_0\'(x)+p(x)y_0(x)=0\iff\\\&0+y_0\'(x)+p(x)y_0(x)=0\iff\\\&y_0\'(x)+p(x)y_0(x)=0\end{aligned}$<-

Таким образом  $y_0(x)$ является решением линейного однородного дифференциального уравнения.

#### Методы решения линейных неоднородных дифференциальных уравнений.

1) **Метод вариации произвольной постоянной.**

Рассмотрим линейное неоднородное уравнение $(1)$. 

Сперва найдем общее решение соответствующего ему однородного линейного уравнения $(2)\quad{y}_0(x)=Ce^{-\int{p(x)dx}}$.

Теперь будем считать, что $C=C(x)$ - неизвестная функция и будем искать решение уравнения $(1)$ в виде ${y}(x)=C(x)e^{-\int{p(x)dx}}\quad(3)$.

Подставим последнее выражение в уравнение $(1)$ и преобразуем полученное уравнение:
->$(C(x)e^{-\int{p(x)dx}})\'+p(x)C(x)e^{-\int{p(x)dx}}=q(x)$<-
->$e^{-\int{p(x)dx}}(C\'(x)-C(x)p(x)+p(x)C(x))=q(x)$<-
->$C\'(x)e^{-\int{p(x)dx}}=q(x)$<-
->$C\'(x)=q(x)e^{\int{p(x)dx}}$<-
->$C(x)=\int{q(x)e^{\int{p(x)dx}}}+C_1$<-

Теперь подставим $C(x)$ в решение $(3)$: $(\int{q(x)e^{\int{p(x)dx}}dx}+C_1)e^{-\int{p(x)dx}}$.

Поскольку $C_1$ - произвольная постоянная, а умножение и сложение, в данном случае, операции коммутативные, то для удобства можем переписать полученное решение в виде: $e^{-\int{p(x)dx}}(C+\int{q(x)e^{\int{p(x)dx}}dx})$

Таким образом получили общее решение линейного неоднородного диференциального уравнения $(1)$: $e^{-\int{p(x)dx}}(C+\int{q(x)e^{\int{p(x)dx}}dx})$, где $e^{-\int{p(x)dx}}\int{q(x)e^{\int{p(x)dx}}dx}$ - частное решение неоднородного уравнения (1), а $Ce^{-\int{p(x)dx}}$ - общее решение соответствующего однородного уравнения.

2) **Метод Бернулли**.

Будем искать решение уравнения $(1)$ в виде $y(x)=vu$, где  $v=v(x),u=u(x)$ - неизвестные функции. Подставим последнее выражение в $(1)$:
->$(vu)\'+p(x)vu=q(x)$<-
->$v\'u+vu\'+p(x)vu=q(x)$<-
->$u\'v+u(v\'+p(x)v)=q(x)\quad(4)$<-

Выберем функцию $v$, так чтобы выполнялось $v\'+p(x)v=0$.

Последнее уравнение является однородным линейным мдиффеенциальным уравнением и его общее решение имеет вид: $v=Ce^{-\int{p(x)dx}}$

Для определенности будем считать, что $C=1$. Подставим $v$ в $(4)$:
->$u\'e^{-\int{p(x)dx}}+0=q(x)$<-
->$u\'=e^{\int{p(x)dx}}q(x)$<-
->$u=\int{e^{\int{p(x)dx}}q(x)dx}+C$<-

Таким образом, общее решение неоднородного уравнения $(1)$ имеет вид:
->$y=vu=e^{-\int{p(x)dx}}(\int{e^{\int{p(x)dx}}q(x)dx}+C)$<-
где $e^{-\int{p(x)dx}}\int{e^{\int{p(x)dx}}q(x)dx}$ - частное решение неоднородного уравнения $(1)$, $Ce^{-\int{p(x)dx}}$ - общее решение соответствующего однородного уравнения.',
            'examples' => '1) Решить задачу Коши $y\'-ye^x=0,\quad{}y(0)=1$.

Уравнение является однородным, поэтому можем его решить, разделив переменые:
->$\frac{dy}{y}=e^xdx$<-
->$lny=e^x+\overline{C}$<-
->$y=Ce^{e^x}$<-

Мы делили на $y$, но решение $y=0$ получается из общего решения при $C=0$

Далее находим $C$, удовлетворяющее начальным условиям задачи Коши:
->$1=Ce^{e^0}\implies{C=}\frac{1}{e}$<-
Ответ: $y=e^{e^x-1}$

2) Решить линейное уравнение $y\'-y\tg{x}=\frac{1}{cos^3x}$ методом вариации произвольной постоянной.

Найдем общее решение однородного уравнения $y\'-y\tg{x}=0:$
->${y}_0=Ce^{\int{tgxdx}}$<-
->${y}_0=C\frac{1}{cosx}$<-

Теперь будем искать общее решение неоднородного уравнения в виде $y=\frac{C(x)}{cosx}\quad{(1)}$.

Подставляем в уравнение и решаем:
->$(\frac{C(x)}{cosx})\'-\frac{C(x)}{cosx}tgx=\frac{1}{cos^3x}$<-
->$\frac{C\'(x)cosx}{cos^2x}+\frac{sinxC(x)}{cos^2x}-\frac{C(x)sinx}{cos^2x}=\frac{1}{cos^3x}$<-
->$C\'(x)=\frac{1}{cos^2x}$<-
->$C(x)=tgx+C_1$<-

Подставляя $C(x)$ в $(1)$ получаем общее решение неоднородного уравнения: $y=\frac{\tg{x}+C_1}{cosx}$

3) Решить линейное уравнение $y\'xlnx-y=3x^3ln^2x$ методом Бернулли.

Решение будем искать в виде $y=uv$, где  $u=u(x),v=v(x)$ - неизвестные функции.

Подставим последнее выражение в уравнение и преобразуем полученное уравнение:
->$(u\'v+v\'u)xlnx-uv=3x^3ln^2x$<-
->$u\'v+u(v\'-\frac{1}{xlnx}v)=3x^2lnx\quad{(2)}$<-

Далее подберем такую функцию $v$, что будет справедливо равенство $v\'-\frac{1}{xlnx}=0$.

Решаем последнее однородное линейное уравнение:
->$v=C_1e^{\int{\frac{dx}{xlnx}}}$<-
->$v=C_1e^{\int{\frac{d\ln{x}}{lnx}}}$<-
->$v=C_1\ln{x}$<-

Полагаем, $C_1=1$ и подставляем полученную функцию в уравнение $(2)$: $u\'lnx=3x^2lnx$, тогда $u=x^3+C$

Находим искомое общее решение неоднородного уравнения $y=lnx(C+x^3)$

4) Решить уравнение $y\'=\frac{y}{2ylny+y-x}$.

Данное уравнение является однородным относительно $x$. Приведем его к нормальному виду: 
->$\frac{dy}{dx}(2ylny+y-x)=y$<-
->$2ylny+y-x=y\frac{dx}{dy}$<-
->$x\'+\frac{x}{y}=2lny+1$<-

Находим решение по формуле $x(y)=e^{-\int{p(y)dy}}(C+\int{q(y)e^{\int{p(y)dy}}dy})$:
->$x=e^{-\int{\frac{1}{y}dy}}(C+\int{(2lny+1)e^{\int{\frac{1}{y}dy}}dy})$<-
->$x=\frac{1}{y}(C+y^2\ln{y})$<-

Ответ: $x=\frac{1}{y}(C+y^2\ln{y})$'
        ]);

        $questions = [
            [
                'q' => 'Какой вид имеет решение уравнения $y\'+p(x)y=0$, где $p(x)$ - заданная непрерывная функция?',
                't' => 'test_one',
                'a' => [
                    '$Cxe^{\int{-p(x)dx}}$',
                    '$p(x)e^{\int{-p(x)dx}}$',
                    '$C(x)e^{\int{-p(x)dx}}$',
                    '$Ce^{\int{-p(x)dx}}$',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Пусть $y_1,y_2$ - решения уравнения $y\'+p(x)y=0$, тогда какие функции будут также его решениями?',
                'a' => [
                    '$y_1y_2$',
                    '$y_1+y_2$',
                    '$y_1-y_2$',
                    '$Cy_1$',
                    '$C(y_1+y_2)$',
                    '$C_1y_1+C_2y_2$',
                ],
                'c' => [false, true, true, true, true, true]
            ],
            [
                'q' => 'В каком виде, согласно методу вариации произвольной постоянной будем искать частное решение неоднородного линейного уравнения $y\'(x)+p(x)y(x)=q(x)$?',
                't' => 'test_one',
                'a' => [
                    '$Cxe^\int{-p(x)dx}$',
                    '$C(x)e^\int{-p(x)dx}$',
                    '$Cxe^\int{p(x)dx}$',
                    '$C(x)e^\int{p(x)dx}$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Пусть дано уравнение $y\'(x)+p(x)y(x)=q(x)$. $y_1(x)$ - его частное решение, $y_0(x)$ - общее решение уравнения $y\'(x)+p(x)y(x)=0$. Найдите общее решение данного неоднородного уравнения.',
                't' => 'test_one',
                'a' => [
                    '$y=Cy_0(x)+C_1y_1(x)+C_2$',
                    '$y=y_0(x)+y_1(x)$',
                    '$y=y_0(x)+y_1(x)+C$',
                    '$y=y_0(x)+q(x)y_1(x)$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Выберите линейные дифференциальные уравнения?',
                'a' => [
                    '$y\'+2x^2y=e^{-x}$',
                    '$x^2y\'+xy+1=0$',
                    '$e^xy\'+xy=0$',
                    '$x^2y\'+y^2=0$',
                    '$dx+dy=0$',
                    '$yy\'+xy=1$',
                    '$y\'-y\tg{x}=\frac{1}{cos^3{x}}$',
                    '$y\'-y\tg{x}=\frac{1}{cos^3{y}}$',
                ],
                'c' => [true, true, true, false, true, false, true, false]
            ],
//            [
//                'q' => '',
//                'a' => [
//                    '',
//                    '',
//                    '',
//                    '',
//                ],
//                'c' => [false, true, false, false]
//            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнение Бернулли. Уравнение Рикатти.',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '#### Уравнение Бернулли

Уравнение вида $y\'+p(x)y=q(x)y^m\quad{m\not=1}\quad{(1)}$ называется **уравнением Бернулли.**

Умножим обе части уравнения $(1)$ на $(1-m)y^{-m}$, получим:
->$(1-m)y\'y^{-m}+p(x)(1-m)y^{1-m}=q(x)(1-m)$<-

Теперь сделаем замену $z=y^{1-m}$, тогда $z\'=(1-m)y^{-m}y\'$ и уравнение примет вид:
->$z\'+p(x)(1-m)z=q(x)(1-m)$<-

Обозначим  $p_1(x)=p(x)(1-m),q_1(x)=q(x)(1-m)$.

Получим линейное неоднородное дифференциальное уравнение относительно $z$:
->$z\'+p_1(x)z=q_1(x)$<-

Решив это уравнение найдем $z$.  Далее возвращаемся к  $y$ и получаем $y=z^{m-1}$ - решение уравнения Бернулли.

★ Уравнение Бернулли можно решить методом Бернулли.

#### Уравнение Риккати.

Уравнение вида $y\'=P(x)y^2+Q(x)y+R(x)\quad{(2)}$ называется **уравнением Риккати**.

**Утверждение**. Если известно одно частное решение $y_1=y_1(x)$ уравнения Риккати, то с помощью замены $y=y_1+\frac{1}{z}$, где $z=z(x)$ - новая неизвестная функция, уравнение Риккати сводится к линейному.

*Доказательство:* Пусть $y_1=y_1(x)$ - частное решение уравнения $(2)$. Тогда $y_1\'-(P(x)y_1^2+Q(x)y_1+R(x))=0$.

Сделаем замену $y=y_1+\frac{1}{z}$. Тогда:
->$y_1\'-\frac{z\'}{z^2}=P(x)(y_1^2+\frac{2y_1}{z}+\frac{1}{z^2})+Q(x)(y_1+\frac{1}{z})+R(x)$<-
->$y_1\'-(P(x)y_1^2+Q(x)y_1+R(x))=\frac{z\'}{z^2}+P(x)(\frac{2y_1}{z}+\frac{1}{z^2})+\frac{1}{z}Q(x)$<-
->$z\'+P(x)(2y_1z+1)+zQ(x)=0$<-
->$z\'+(2y_1P(x)+Q(x))z=-P(x)$<-

Обозначим $p(x)=2y_1P(x)+Q(x),q(x)=-P(x)$ и получим линейное неоднородное уравнение, относительно $z$:
->$z\'+p(x)z=q(x)$ ∎<-

Продолжим решение уравнение Риккати (не будем учитывать последнюю замену):
->$z(x)=e^{-\int{(2y_1P(x)+Q(x))dx}}(C-\int{P(x)e^{\int{(2y_1P(x)+Q(x))dx}}dx})$<-
->$y=y_1+\frac{1}{z}\implies{z}=\frac{1}{y-y_1}\implies$<-
->$\frac{1}{y-y_1}=e^{-\int{(2y_1P(x)+Q(x))dx}}(C-\int{P(x)e^{\int{(2y_1P(x)+Q(x))dx}}dx})$<-
->$y=y_1+\frac{e^{\int{(2y_1P(x)+Q(x))dx}}}{C-\int{P(x)e^{\int{(2y_1P(x)+Q(x))dx}}dx}}$<-

Послучили решение дробно-линейное относительно $C$. Этим доказано следующее утверждение:

**Утверждение.** Если общее решение дифференциального уравнения есть дробно-линейная функция относительно  $C$, то это уравнение является уравнением Риккати.

**Утверждение.** Если известно 2 частных решения уравнения Риккати, то уравнение решается с помощью одной квадратуры.

*Доказательство:*

**Утверждение.** Если известны 3 частных решения уравнения Риккати, то уравнение решается без квадратур.

*Доказательство:*
',
            'examples' => '1) Решить уравнение $2y\'lnx+\frac{y}{x}=y^{-1}cosx$.

Это уравнение Бернулли. Cперва привкедем его к удобному виду. 

Умножим уравнение на $\frac{y}{lnx}$: $\quad{2y}y\'+\frac{y^2}{xlnx}=\frac{cosx}{lnx}$ 

Сделаем замену $z=y^2$, тогда $z\'=2yy\'$ и получим уравнение:
->$z\'+\frac{z}{xlnx}=\frac{cosx}{lnx}$<-

Находим его решение: 
->$z=e^{-\int{\frac{dx}{xlnx}}}(C+\int{\frac{cosx}{lnx}e^{\int{\frac{dx}{xlnx}}}dx})$<-

Найдем интегралы:

->$\int{{\frac{dx}{xlnx}}}=\int{{\frac{dlnx}{lnx}}}=lnlnx+C_1$<-
->$\int{\frac{cosx}{lnx}e^{lnlnx}dx}=\int{\frac{cosx}{lnx}lnxdx}=\int{cosxdx}=sinx+C_2$<-

->$z=\frac{1}{lnx}(C+sinx)$<-
->$z=y^2\implies{y^2}=\frac{1}{lnx}(C+sinx)$<-

Ответ: $y^2lnx=C+sinx$

2) Решить уравнение $3y\'+y^2+\frac{2}{x^2}=0$.

Это уравнение Риккати. 

Будем искать его частное решение в виде $y=\frac{a}{x}$ (данный вид решения выбран потому что свободный член уравнения есть $\frac{2}{x^2}$). 

->$y=\frac{a}{x}\implies{-3ax^{-2}}+a^2x^{-2}+2x^{-2}=0$<-
->$a^2-3a+2=0\implies{a=1}$ или $a=2$<-

Получаем $y_1=\frac{1}{x}$ - частное решение уравнения Риккати.

Теперь сделаем замену $y=\frac{1}{x}+\frac{1}{z},z=z(x)$, тогда уравнение примет вид:
->$-3(\frac{1}{x^2}+\frac{z\'}{z^2})+(\frac{1}{x^2}+\frac{2}{xz}+\frac{1}{z^2})+\frac{2}{x^2}=0$<-
->$-3\frac{z\'}{z^2}+\frac{2}{xz}+\frac{1}{z^2}=0$<-
->$z\'-\frac{2z}{3x}-\frac{1}{3}=0$<-
->$z=e^{\frac{2}{3}\int{\frac{1}{x}dx}}(C+\frac{1}{3}\int{e^{-\frac{2}{3}\int{\frac{1}{x}dx}}})$<-
->$z=x^{\frac{2}{3}}(C+x^{\frac{1}{3}})$<-
->$y=\frac{1}{x}+\frac{1}{z}\implies{z}=\frac{x}{xy-1}\implies\frac{x}{xy-1}=Cx^{\frac{2}{3}}+x$<-

Ответ: $\frac{x}{xy-1}=Cx^{\frac{2}{3}}+x$'
        ]);

        $questions = [
            [
                'q' => 'Какой вид имеет уравнение Бернулли?',
                't' => 'test_one',
                'a' => [
                    '$y\'+p(x)y=q(x)$',
                    '$y\'+p(x)y^m=q(x)$',
                    '$y\'+p(x)y=q(x)y^m$',
                    '$y\'y^m+p(x)y=q(x)$',
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Выберите уравнения Бернулли',
                'a' => [
                    '$y\'+e^xy=1$',
                    '$y\'+cos(x)y^2=0$',
                    '$y\'+3sin(2x)y=y^2$',
                    '$y\'(x^3sin(y)+ln(y)x)=1$',
                    '$y\'+3xy=1+2x$',
                    '$(x^2+y^2+1)dy+xydx=0$',
                    '$2y\'sinx+ycosx=y^3sin^2x$',
                    '$2y\'sinx+ycosx=y^3sin^2x+1+x$'
                ],
                'c' => [false, false, true, true, false, true, true, false]
            ],
            [
                'q' => 'С помощью какой замены уравнение Риккати $y\'=P(x)y^2+Q(x)y+R(x)\quad{(2)}$, одно из частных решений которого $y_1(x)$, сводится к линейному уравнению?',
                't' => 'test_one',
                'a' => [
                    '$y=y_1+\frac{1}{z},\quad{z}=z(x)$',
                    '$y=y_1+z,\quad{z}=z(x)$',
                    '$y=y_1+\frac{1}{z^2},\quad{z}=z(x)$',
                    '$y=z+\frac{1}{y_1},\quad{z}=z(x)$',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'С помощью скольки квадратур решается уравнение Риккати, если известно 2 его частных решения',
                't' => 'task',
                'a' => '1'
            ],
            [
                'q' => 'С помощью скольки квадратур решается уравнение Риккати, если известно 3 его частных решения',
                't' => 'task',
                'a' => '0'
            ],
            [
                'q' => 'Выберите уравнения Риккати',
                'a' => [
                    '$y\'+e^xy=y^2+1$',
                    '$y\'+cos(x)y^2=0$',
                    '$y\'+3sin(2x)y=y^2$',
                    '$y\'(x^3sin(y)+ln(y)x)=1$',
                    '$y\'+3xy=1+2x+y^2sinx$',
                    '$(x^2+y^2+1)dy+xydx=0$',
                    '$2y\'sinx+ycosx=y^3sin^2x$',
                    '$2y\'sinx+ycosx=y^2sin^2x+1+x$'
                ],
                'c' => [true, false, false, false, true, false, false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнения в полных дифференциалах',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Уравнение вида $M(x,y)dx+N(x,y)dy=0\quad(1)$ называется **уравнением в полных дифференциалах**, если его левая часть есть полный дифференциал некоторой функции $u(x,y)$. (т.е. $du=M(x,y)dx+N(x,y)dy)$

Предполагается, что функции $M,N$ непрерывны по обеим переменным в некоторой области $D$ задания уравнения и нигде одновременно в 0 не обращаются.

Интегралом уравнения $(1)$ называется функция $u(x,y)$, обращающаяся в константу на любом решении уравнения $(1)$ и не равная тождественно константе ни в какой части области $D$. 

->$u(x,y(x))=C\space\forall{y}(x)$, где $y(x)$ - решение уравнения $(1)$<-

$u(x,y)=C$ - общий интеграл уравнения в полных дифференциалах $(1)$.

★ Особых решений уравнение в полных дифференциалах не имеет.

**Утверждение**. Уравнение $(1)$ является уравнением в полных дифференциалах, тогда и только тогда, когда $\frac{\partial{M}}{\partial{y}}=\frac{\partial{N}}{\partial{x}}$.

*Доказательство:*
$\implies$ $(1)$ - уравнение в полных дифференциалах, тогда 
->$du=M(x,y)dx+N(x,y)dy$<-
По определению:
->$du=\frac{\partial{u}}{\partial{x}}dx+\frac{\partial{u}}{\partial{y}}dy$<-
Из двух последних равенств следует система:
->$\begin{cases}M(x,y)=\frac{\partial{u}}{\partial{x}}\quad|\frac{\partial}{\partial{y}}\\\N(x,y)=\frac{\partial{u}}{\partial{y}}\quad|\frac{\partial}{\partial{x}}\end{cases}\quad\begin{cases}\frac{\partial{M}(x,y)}{\partial{y}}=\frac{\partial^2{u}}{\partial{x}\partial{y}}\\\frac{\partial{N}(x,y)}{\partial{x}}=\frac{\partial^2{u}}{\partial{y}\partial{x}}\end{cases}\implies\frac{\partial{M}}{\partial{y}}=\frac{\partial{N}}{\partial{x}}$<- 

$\impliedby$  Покажем, что $\exists{u}\space(x,y):\begin{cases}\frac{\partial{u}}{\partial{x}}=M(x,y)\\\frac{\partial{u}}{\partial{y}}=N(x,y)\end{cases}\quad(2)$

Из первого уравнения системы $(2)$ находим $u(x,y)=\int_{x_0}^{x}{M(x,y)dx}+\varphi(y)\quad{(3)}$,

Теперь подставим выражение $(3)$ во второе уравнение системы $(2)$:
->$\frac{\partial}{\partial{y}}\int_{x_0}^{x}{M(x,y)dx}+\varphi\'(y)=N(x,y)$<-
->$\int_{x_0}^{x}{\frac{\partial{M}(x,y)}{\partial{y}}dx}+\varphi\'(y)=N(x,y)$<-

По условию $\frac{\partial{M}}{\partial{y}}=\frac{\partial{N}}{\partial{x}}$,  тогда:
->$\int_{x_0}^{x}{\frac{\partial{N}(x,y)}{\partial{x}}dx}+\varphi\'(y)=N(x,y)$<-
->$N(x,y)-N(x_0,y)+\varphi\'(y)=N(x,y)$<-
->$\varphi\'(y)=N(x_0,y)$<-
->$\varphi(y)=\int_{y_0}^y{N(x_0,y)dy}+C$<-

Подставим последнее выражение в $(3)$:
->$u(x,y)=\int_{x_0}^x{M(x,y)dx}+\int_{y_0}^y{N(x_0,y)dy}+C$<-

Таким образом, определили функцию $u(x,y)$ с точностью до произвольной постоянной. ∎

$du=0,u=C$, тогда общий интеграл уравнения $(1)$:
->$\int_{x_0}^x{M(x,y_)dx}+\int_{y_0}^y{N(x_0,y)}=\overline{C}$<-
$(x_0,y_0)$ - любая фиксированная точка из области задания уравнения.

★ Если задана задача Коши, то в качестве $(x_0,y_0)$ удобно брать начальную точку.',
            'examples' => '1) Решить уравнение $(2-9xy^2)xdx+(4y^2-6x^3)ydy=0$.

Данное уравнение является уравнением в полных дифференциалах, так как
->$\frac{\partial{M(x,y)}}{\partial{y}}=-18x^2y=\frac{\partial{N(x,y)}}{\partial{x}}$<-

Значит существует такая функция $u=u(x,y)$ что $du=(2-9xy^2)xdx+(4y^2-6x^3)ydy$

Восстановим функцию $u$, для этого решим систему:

$\begin{cases}\frac{\partial{u}}{\partial{x}}=(2-9xy^2)x\\\frac{\partial{u}}{\partial{y}}=(4y^2-6x^3)y\end{cases}$

Из первого уравнения системы находим $u$ с точностью до произвольной функции $\varphi(y)$:
->$u=\int{(2-9xy^2)xdx+\varphi(y)}$<-
->$u=x^2-3x^3y^2+\varphi(y)\quad(1)$<-

Теперь, для нахождения $\varphi(y)$, подставляем $u$ во второе уравнение системы:
->$-6x^3y+\varphi\'(y)=4y^3-6x^3y$<-
->$\varphi\'(y)=4y^3$<-
->$\varphi(y)=y^4+\overline{C}$<-

Теперь подставим найденную функцию $\varphi(y)$ в $(1)$:
->$u=x^2-3x^3y^2+y^4+\overline{C}$<-

Тогда общим интегралом дифференциального уравнения будет 
->$x^2-3x^3y^2+y^4=C$<-'
        ]);

        $questions = [
            [
                'q' => 'Какие уравнения являются уравнениями в полных дифференциалах?',
                'a' => [
                    '$\frac{3x^2+y^2}{y^2}dx-\frac{2x^3+5y}{y^3}dy=0$',
                    '$\frac{y}{x}dx+x^3dy=0$',
                    '$(e^{-y}+x)dx-(3y^2+xe^{-y})dy=0$',
                    '$(\frac{x}{siny}+8)dx+\frac{cosy(x^2+1)}{cos2y-1}dy=0$',
                    '$2y(y+\sqrt{x^2-y})dx-\sqrt{x^2-y}dy=0$',
                    '$(cos(y)+y^2sin(2x))dx=2ycos^2xdy$',
                    '$\frac{y}{x}dx+(y^7+lnx)dy=0$',
                    '$\frac{y^2-x^3}{y^2}dx-\frac{2x^3+5y}{y^3}dy=0$',
                ],
                'c' => [true, false, false, true, false, false, true, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Интегрирующий множитель',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Если уравнение $M(x,y)dx+N(x,y)dy=0\quad(1)$, не является уравнением в полных дифференциалах, то $\exists\space\omega(x,y),$ после умножения на которую уравнение $(1)$ превращается в уравнение в полных дифференциалах.

Если $\omega(x,y)M(x,y)dx+\omega(x,y)N(x,y)dy=0$ - уравнение в полных дифференциалах, то $\omega(x,y)$ называется интегрирующим множителем уравнения $(1)$.

Рассмотрим некоторые частные случаи нахождения интегрирующего множителя.

1) Пусть $\exists\space\omega(x)$, тогда уравнение

->$\omega(x)M(x,y)dx+\omega(x)N(x,y)dy=0$<-
является уравнением в полных дифференциалах тогда и только тогда, когда

->$\frac{\partial{(\omega(x)M(x,y)})}{\partial{y}}=\frac{\partial{(\omega(x)N(x,y)})}{\partial{x}}$<-
Откуда
->$\omega(x)\frac{\partial{M(x,y)}}{\partial{y}}=\frac{\partial\omega(x)}{\partial{x}}N(x,y)+\omega(x)\frac{\partial{N(x,y)}}{\partial{x}}$<-
->$\frac{\partial\omega(x)}{\partial{x}}=\omega(x)\frac{\frac{\partial{M(x,y)}}{\partial{y}}-\frac{\partial{N(x,y)}}{\partial{x}}}{N(x,y)}$<-

Левая часть последнего равенства зависит только от $x$, поэтому для существования интегрирующего множителя $\omega(x)$ необходимо и достаточно, чтобы и правая часть этого равенства зависела только от $x$.

Обозначим $\frac{\frac{\partial{M(x,y)}}{\partial{y}}-\frac{\partial{N(x,y)}}{\partial{x}}}{N(x,y)}=\varphi(x)\quad(2)$, тогда  
->$\frac{\partial\omega(x)}{\omega(x)}=\varphi(x)dx$<-
->$\ln\omega(x)=\int{\varphi(x)dx}+C$<-
->$\omega(x)=\overline{C}e^{\int{\varphi(x)dx}}$<-
->$\omega(x)=e^{\int{\varphi(x)dx}}\quad(3)$<-

Если у уравнения есть интегрирующий множитель, зависящий от $x$, и это определяется по формуле $(2)$, то он равен $(3)$.

2) Пусть $\exists\space\omega(y)$, тогда уравнение

->$\omega(y)M(x,y)dx+\omega(y)N(x,y)dy=0$<-
является уравнением в полных дифференциалах тогда и только тогда, когда

->$\frac{\partial{(\omega(y)M(x,y)})}{\partial{y}}=\frac{\partial{(\omega(y)N(x,y)})}{\partial{x}}$<-
Откуда
->$\omega(y)\frac{\partial{N(x,y)}}{\partial{x}}=\frac{\partial\omega(y)}{\partial{y}}M(x,y)+\omega(y)\frac{\partial{M(x,y)}}{\partial{y}}$<-
->$\frac{\partial\omega(y)}{\partial{y}}=\omega(y)\frac{\frac{\partial{N(x,y)}}{\partial{x}}-\frac{\partial{M(x,y)}}{\partial{y}}}{M(x,y)}$<-

Левая часть последнего равенства зависит только от $y$, поэтому для существования интегрирующего множителя $\omega(y)$ необходимо и достаточно, чтобы и правая часть этого равенства зависела только от $y$.

Обозначим $\frac{\frac{\partial{N(x,y)}}{\partial{x}}-\frac{\partial{M(x,y)}}{\partial{y}}}{M(x,y)}=\varphi(y)\quad(4)$, тогда  
->$\frac{\partial\omega(y)}{\omega(y)}=\varphi(y)dy$<-
->$\ln\omega(y)=\int{\varphi(y)dy}+C$<-
->$\omega(y)=\overline{C}e^{\int{\varphi(y)dy}}$<-
->$\omega(y)=e^{\int{\varphi(y)dy}}\quad(5)$<-

Если у уравнения есть интегрирующий множитель, зависящий от $y$, и это определяется по формуле $(4)$, то он равен $(5)$.

3) Пусть $\exists\space\omega(\lambda(x,y))$, тогда уравнение

->$\omega(\lambda(x,y))M(x,y)dx+\omega(\lambda(x,y))N(x,y)dy=0$<-
является уравнением в полных дифференциалах тогда и только тогда, когда

->$\frac{\partial{(\omega(\lambda(x,y))M(x,y)})}{\partial{y}}=\frac{\partial{(\omega(\lambda(x,y))N(x,y)})}{\partial{x}}$<-
Откуда
->$\frac{\partial\omega}{\partial{\lambda}}\frac{\partial{\lambda}}{\partial{y}}M(x,y)+\omega(\lambda(x,y))\frac{\partial{M}(x,y)}{\partial{y}}=\frac{\partial\omega}{\partial{\lambda}}\frac{\partial{\lambda}}{\partial{x}}N(x,y)+\omega(\lambda(x,y))\frac{\partial{N}(x,y)}{\partial{x}}$<-
->$\frac{\partial\omega}{\partial\lambda}(\frac{\partial\lambda}{\partial{y}}M(x,y)-\frac{\partial\lambda}{\partial{x}}N(x,y))=\omega(\lambda(x,y))(\frac{\partial{N(x,y)}}{\partial{x}}-\frac{\partial{M(x,y)}}{\partial{y}})$<-
->$\frac{\omega\'(\lambda(x,y))}{\omega(\lambda(x,y))}=\frac{\frac{\partial{N(x,y)}}{\partial{x}}-\frac{\partial{M(x,y)}}{\partial{y}}}{\frac{\partial\lambda}{\partial{y}}M(x,y)-\frac{\partial\lambda}{\partial{x}}N(x,y)}$<-

Левая часть последнего равенства зависит только от $\lambda(x,y)$, поэтому для существования интегрирующего множителя $\omega(\lambda(x,y))$ необходимо и достаточно, чтобы и правая часть этого равенства зависела только от $\lambda(x,y)$.

Обозначим $\frac{\frac{\partial{N(x,y)}}{\partial{x}}-\frac{\partial{M(x,y)}}{\partial{y}}}{\frac{\partial\lambda}{\partial{y}}M(x,y)-\frac{\partial\lambda}{\partial{x}}N(x,y)}=\varphi(\lambda(x,y))\quad(6)$, тогда  
->$\frac{\omega\'(\lambda(x,y))}{\omega(\lambda(x,y))}=\varphi(\lambda(x,y))d\lambda$<-
->$\ln\omega(\lambda(x,y))=\int{\varphi(\lambda(x,y))d\lambda}+C$<-
->$\omega(\lambda(x,y))=\overline{C}e^{\int{\varphi(\lambda(x,y))d\lambda}}$<-
->$\omega(\lambda(x,y))=e^{\int{\varphi(\lambda(x,y))d\lambda}}\quad(7)$<-

Если у уравнения есть интегрирующий множитель, зависящий от $\lambda(x,y)$, и это определяется по формуле $(6)$, то он равен $(7)$.

★ Если $\omega$ во всех точках некоторой кривой обращается в $\infty$, то могут быть потеряны некотороые решения (они могут оказаться особыми).

★ Если $\omega$ во всех точках некоторой кривой обращается в $0$, то могут появиться новые решения.

★ Для решения некоторых уравнений можно применять метод выделения полных дифференциалов, используя известные формулы:

->$\begin{matrix}
   d(xy)=ydx+xdy & d(y^2)=2ydy \\\
   d(\frac{x}{y})=\frac{ydx-xdy}{y^2} & d(lny)=\frac{dy}{y}
\end{matrix}\quad\text{и т.п.}$<-',
            'examples' => '1) Решить уравнение $y^2dx-(xy+x^3)dy=0$, найдя каким-либо способом интегрирующий множитель.

Уравнение не является уравнением в полных дифференциалах, так как:

->$\frac{\partial{M(x,y)}}{\partial{y}}=2y,\quad\frac{\partial{N(x,y)}}{\partial{x}}=-y-3x^2$<-

Так как $\frac{{\frac{\partial{M(x,y)}}{\partial{y}}-\frac{\partial{N(x,y)}}{\partial{x}}}}{N(x,y)}=\frac{3y+3x^2}{-xy-x^3}=\frac{3(y+x^2)}{-x{y+x^2}}=-\frac{3}{x}$, то $\exists$ интегрирующий множитель $\space\omega(x)=e^{\int{-\frac{3}{x}dx}}=\overline{C}x^{-3}$

Теперь умножим наше уравнение на $\omega(x)$:
->$\frac{y^2}{x^3}dx-(\frac{y}{x^2}+1)dy=0$<-

Решим полученное уравнение в полных дифференциалах:

$\frac{\partial{u}}{\partial{x}}=\frac{y^2}{x^3}\implies{u}=-\frac{y^2}{2x^2}+\varphi(y)$

$\frac{\partial{u}}{\partial{y}}=-(\frac{y}{x^2}+1)\implies{}-\frac{2y}{2x^2}+\varphi\'(y)=-(\frac{y}{x^2}+1)\implies\varphi\'(y)=-1\implies\varphi(y)=-y+C_1$

$u=-\frac{y^2}{2x^2}+\varphi(y)=-\frac{y^2}{2x^2}+y+C_1$

Тогда общий интеграл дифференциального уравнения $-\frac{y^2}{2x^2}+y=\overline{C}$  или $y^2=x^2(C-2y)$

$\omega(x)\to\infty$ при  $x\to{0}$, следовательно может быть особое решение $x=0$. 

Проверкой убеждаемся, что $x=0$ решение. Но не особое, так как входит в общее решение при $C=\infty$

Ответ: $y^2=x^2(C-2y)$

2) Решить уравнение $(x^2-y)dx+x(y+1)dy=0$.

Данное уравнение не является уравнением в полных дифференциалах, так как:
->$\frac{\partial{M(x,y)}}{\partial{y}}=-1,\quad\frac{\partial{N(x,y)}}{\partial{x}}=y+1$<-

Можно заметить что в уравнении присутствуют 2 полных дифференциала:
->$d(x^2+y^2)=2xdx+2ydy,\quad{d}(\frac{y}{x})=\frac{ydx-xdy}{x^2}$<-

Считая что  $x\not=0$ немного преобразуем уравнение:
->$x^2dx+xydy-ydx+xdy=0\quad|\frac{2}{x}$<-
->$(2xdx+2ydy)-2x\frac{ydx-xdy}{x^2}=0$<-
->$d(x^2+y^2)-2xd(\frac{y}{x})=0$<-

Сделаем замену:
->$\begin{cases}x^2+y^2=m\\\frac{y}{x}=n\end{cases}\quad\implies\begin{cases}y=\frac{n\sqrt{m}}{\sqrt{1+n^2}}\\\x=\frac{\sqrt{m}}{\sqrt{1+n^2}}\end{cases}$<-

Тогда уравнение примет вид:
->$dm-\frac{2\sqrt{m}}{\sqrt{1+n^2}}dn=0$<-

Это уравнение с разделяющимися переменными, решим его:
->$\frac{dm}{2\sqrt{m}}=\frac{dn}{\sqrt{1+n^2}}$<-
->$\sqrt{m}=\ln{|n+\sqrt{1+n^2}|}+\overline{C}$<-
->$\sqrt{x^2+y^2}=\ln{(\frac{y}{x}+\sqrt{1+\frac{y^2}{x^2}}})+\overline{C}$<-
->$xe^{\sqrt{x^2+y^2}}=C(y+\sqrt{x^2+y^2})$<-

$x=0$ входит в общее решение при $C=0$, поэтому особым не является.

Ответ: $xe^{\sqrt{x^2+y^2}}=C(y+\sqrt{x^2+y^2})$

'
        ]);

        $questions = [
            [
                'q' => 'Найдите интегрирующий множитель, зависящий от x, для уравнения $(x^2+y^2+x)dx+ydy=0$',
                't' => 'test_one',
                'a' => [
                    '$x^2$',
                    '$e^{2x}$',
                    '$e^{3x}$',
                    '$e^{x}$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    '',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнения не разрешенные относительно производной',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '#### Уравнения первого порядка $n-$й степени относительно $y\'$

Рассмотрим дифференциальное уравнение $(y\')^n+a_1(x,y)(y\')^{n-1}+...+a_{n-1}(x,y)y\'+a_n(x,y)=0\quad(1)$

Решим его относительно $y\'$. 

Пусть $y\'=f_i(x,y),i=\overline{1,k},k\leq{n}$ - вещественные решения уравнения $(1)$.

Тогда общий интеграл уравнения (1) выразится совокупностью интегралов $F_i(x,y,C),i=\overline{1,k}$,  являющимися интегралами соответствующих по индексу $i$ уравнений.

Таким образом через каждую точку области, в которой $y\'$ принимает вещественные значения, проходит  $k$ интегральных линий.

#### Уравнения вида $f(y,y\')=0$

Пусть уравнение  $f(y,y\')\quad(2)$ разрешимо относительно $y$, тогда  $y=\varphi(y\')$.

Полагаем  $y\'=p$, тогда $y=\varphi(p),\quad{dy}=pdx$. 

Далее дифференцируем это уравнение:  $dy=\varphi\'(p)dp$

Заменяем $dy$ на $pdx$: $pdx=\varphi\'(p)dp$

Решим полученное уравнение с разделяющимися переменными: 
->$dx=\frac{\varphi\'(p)dp}{p}$<-
->$x=\int{\frac{\varphi\'(p)dp}{p}}+C$<-

Получаем общее решение уравнения $(2)$ в параметрической форме:
->$\begin{cases}x=\int{\frac{\varphi\'(p)dp}{p}}+C\\\y=\varphi(p)\end{cases}$\quad(3)<-

#### Уравнения вида $f(x,y\')=0$

Пусть уравнение  $f(x,y\')\quad(4)$ разрешимо относительно $x$, тогда  $x=\varphi(y\')$.

Полагаем  $y\'=p$, тогда $x=\varphi(p),\quad{dx}=\frac{dy}{p}$. 

Далее дифференцируем это уравнение:  $dx=\varphi\'(p)dp$

Заменяем $dx$ на $\frac{dy}{p}$: $\frac{dy}{p}=\varphi\'(p)dp$

Решим полученное уравнение с разделяющимися переменными: 
->$dy=p\varphi\'(p)dp$<-
->$y=\int{p\varphi\'(p)dp}+C$<-

Получаем общее решение уравнения $(2)$ в параметрической форме:
->$\begin{cases}x=\varphi(p)\\\y=\int{p\varphi\'(p)dp}+C\end{cases}\quad(5)$<-

★ В формулах $(3),(5)$ нельзя рассматривать $p$ как производную. В них $p$ является просто параметром.

#### Уравнения Лагранжа и Клеро.

 Уравнение вида $y=x\varphi(y\')+\psi(y\')$, называется **уравнением Лагранжа**.
 
 Положим $y\'=p$, тогда $dy=pdx$ и уравнение примет вид:
 ->$y=x\varphi(p)+\psi(p)$<-
 Дифференцируем уравнение по $x$:
 ->$dy=\varphi(p)dx+x\varphi\'(p)dp+\psi\'(p)dp$<-
 ->$pdx=\varphi(p)dx+x\varphi\'(p)dp+\psi\'(p)dp$<-
 ->$px\'=\varphi(p)x\'+x\varphi\'(p)+\psi\'(p)\quad|\frac{1}{dp}$<-
 ->$x\'+x\frac{\varphi\'(p)}{\varphi(p)-p}=\frac{\psi\'(p)}{p-\varphi(p)}$<-
 
 Получили линейное уравнение, относительно $x$ и его решение:
 ->$x=e^{-\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}(C+\int{\frac{\psi\'(p)}{p-\varphi(p)}e^{\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}dp})$<-
 
 Получаем решение уравнения Лагранжа в параметрической форме:
  ->$\begin{cases}x=e^{-\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}(C+\int{\frac{\psi\'(p)}{p-\varphi(p)}e^{\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}dp})\\\
 y=x\varphi(p)+\psi(p)\end{cases}$<-
 ',
            'examples' => '1) Решить уравнение $x^2(y\')^2+3xyy\'+2y^2=0$.

Разрешим уравнение относительно $y\'$:
->$D=9x^2y^2-8x^2y^2=x^2y^2,\quad\sqrt{D}=xy$<-
->$y\'=\frac{-3xy\pm{xy}}{2x^2}$<-
->$y\'=-\frac{y}{x},\quad{y\'}=-\frac{2y}{x}$<-
->$\frac{dy}{y}=-\frac{dx}{x},\quad\frac{dy}{y}=-\frac{2x}{x}$<-
->$y=C_1\frac{1}{x},\quad{y}=C_2\frac{1}{x^2}$<-
->$xy=C_1,\quad{x^2y}=C_2$<-

2) Решить уравнение $x=\ln{y\'}+\sin{y\'}$.

Положим $p=y\',$ тогда $dx=\frac{dy}{p}$ и уравнение примет вид:
->$x=\ln{p}+\sin{p}$<-
Дифференцируем полученное уравнение и решаем его: 
->$dx=\frac{dp}{p}+\cos{p}dp$<-
->$dx=\frac{dy}{p}\implies{}dy=dp+p\cos{p}dp$<-
->$y=p+p\sin{p}+\cos{p}+C$<-

Таким образом получаем общее решение уравнения в параметрической форме:
->$\begin{cases}x=\ln{p}+\sin{p}\\\y=p+p\sin{p}+\cos{p}+C\end{cases}$<-

3) Решить уравнение $y\'=e^{\frac{y\'}{y}}$.

Положим $p=y\'$, тогда $dy=pdx$ и уравнение примет вид:
->$p=e^\frac{p}{y}$<-
->$\ln{p}=\frac{p}{y}$<-
->$y=\frac{p}{\ln{p}}$<-
->$dy=\frac{(\ln{p}-1)dp}{\ln^2{p}}$<-
->$dy=pdx\implies{}pdx=\frac{(\ln{p}-1)dp}{\ln^2{p}}$<-
->$dx=\frac{(\ln{p}-1)dp}{p\ln^2{p}}$<-
->$dx=\frac{(\ln{p}-1)d\ln{p}}{\ln^2{p}}$<-
->$x=\ln{\ln{p}}+\frac{1}{\ln{p}}+C$<-

Таким образом получаем общее решение уравнения в параметрической форме:
->$\begin{cases}x=\ln{\ln{p}}+\frac{1}{\ln{p}}+C\\\y=\frac{p}{\ln{p}}\end{cases}$<-'
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    '',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Уравнения Лагранжа и Клеро',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '#### Уравнения Лагранжа и Клеро.

 Уравнение вида $y=x\varphi(y\')+\psi(y\')$, называется **уравнением Лагранжа**.
 
 Положим $y\'=p$, тогда $dy=pdx$ и уравнение примет вид:
 ->$y=x\varphi(p)+\psi(p)$<-
 Дифференцируем уравнение по $x$:
 ->$dy=\varphi(p)dx+x\varphi\'(p)dp+\psi\'(p)dp$<-
 ->$pdx=\varphi(p)dx+x\varphi\'(p)dp+\psi\'(p)dp$<-
 ->$px\'=\varphi(p)x\'+x\varphi\'(p)+\psi\'(p)\quad|\frac{1}{dp}$<-
 ->$x\'+x\frac{\varphi\'(p)}{\varphi(p)-p}=\frac{\psi\'(p)}{p-\varphi(p)}$<-
 
 Получили линейное уравнение, относительно $x$ и его решение:
 ->$x=e^{-\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}(C+\int{\frac{\psi\'(p)}{p-\varphi(p)}e^{\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}dp})$<-
 
 Получаем общее решение уравнения Лагранжа в параметрической форме:
  ->$\begin{cases}x=e^{-\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}(C+\int{\frac{\psi\'(p)}{p-\varphi(p)}e^{\int{\frac{\varphi\'(p)}{\varphi(p)-p}}dp}dp})\\\
 y=x\varphi(p)+\psi(p)\end{cases}$<-
 
 Вспомним, что мы делили на $\varphi(p)-p$. Исключая параметр $p$ из уравнений $\varphi(p)-p=0$ и $y=x\varphi(y\')+\psi(y\')$ найдем возможные особые решения. Те из полученных решений, которые удовлетворяют исходному уравнению, будут особыми решениями.
 
 Частным случаем уравнения Лагранжа является **уравнение Клеро**. Оно имеет вид:
 ->$y=xy\'+\psi(y\')$<-
 
 Решается уравнение также, как и уравнение Лагранжа, в нем $\varphi(y\')=y\'$
 
 Положим $y\'=p$, тогда $dy=pdx$ и уравнение примет вид:
 ->$y=xp+\psi(p)$<-
 Дифференцируем уравнение по $x$:
 ->$dy=pdx+xdp+\psi\'(p)dp$<-
 ->$pdx=pdx+xdp+\psi\'(p)dp$<-
 ->$(x+\psi\'(p))dp=0$<-
 
 Полученное уравнение распадается на 2 уравнения: $x+\psi\'(p)=0$  и $dp=0$. 
 
 $dp=0\implies{p}=C$, тогда общее решение уравнения Клеро: $y=xC+\psi(C)$
 
 Уравнение $x+\psi\'(p)=0$ соответствует особому решению уравнения Клеро. Исключением $p$ из уравнений 
->$y=xp+\psi(p),\quad{x}+\psi\'(p)=0$<-
найдем особое решение.',
            'examples' => '1) Решить уравнение Лагранжа $y=x(y\')^2-\frac{1}{y\'}$.

Положим $p=y\'$, тогда уравнение примет вид:
->$y=xp^2-\frac{1}{p}$<-

Дифференцируем и решаем уравнение:
->$dy=p^2dx+2pxdp+\frac{dp}{p^2}$<-
->$dy=pdx\implies{pdx}=p^2dx+2pxdp+\frac{dp}{p^2}\quad|\frac{1}{dp}$<-
->$(p-p^2)x\'-2px=\frac{1}{p^2}$<-
->$x\'-\frac{p}{1-p}x=\frac{1}{p^3(1-p)}$<-

Получили линейное уравнение, находим его решение по формуле решения линейног дифференциального уравнения:
->$x=e^{\int{\frac{p}{1-p}}dp}(C+\int{\frac{1}{p^3(1-p)}e^{-\int{\frac{p}{1-p}}dp}dp})$<-
->$x=e^{-1+\ln(1-p)}(C+\int{\frac{1}{p^3(1-p)}e^{1-\ln(1-p)}dp})$<-
->$x=\frac{1-p}{e}(C+\int{\frac{edp}{p^3(1-p)^2}})$<-
->$x=\frac{1-p}{e}(C+e\int{\frac{3p^2+2p+1}{p^3}}dp+\int{\frac{-3p+4}{(1-p)^2}}dp)$<-
->$x=\frac{1-p}{e}(C+e(3lnp-2\frac{1}{p}-\frac{1}{2p^2}+\frac{3}{2}\ln{(1-p)^2}+\frac{1}{1-p}))$<-

Таким образом нашли общее решение уравнения Лагранжа в параметрической форме:
->$\begin{cases}x=\frac{1-p}{e}(C+e(3lnp-2\frac{1}{p}-\frac{1}{2p^2}+\frac{3}{2}\ln{(1-p)^2}+\frac{1}{1-p}))\\\y=xp^2-\frac{1}{p}\end{cases}$<-

2) Решить уравнение Клеро $y=xy\'+a\sqrt{1-(y\')^2}$.

Положим $y\'=p$, тогда уравнение примет вид:
->$y=xp+a\sqrt{1-p^2}$<-

Дифференцируем и решаем его:
->$dy=xdp+pdx-\frac{pa}{\sqrt{1-p^2}}dp$<-
->$dy=pdx\implies{pdx}=xdp+pdx-\frac{pa}{\sqrt{1-p^2}}dp$<-
->$(x-\frac{pa}{\sqrt{1-p^2}})dp=0$<-

$dp=0\implies{p}=C$ и тогда общее решение: $y=xC+a\sqrt{1-C^2}$

Найдем особые решения, решив систему:
$\begin{cases}x=\frac{pa}{\sqrt{1-p^2}}\\\y=xp+a\sqrt{1-p^2}\end{cases}\implies{}y^2=x^2+a^2$

Ответ: $y=xC+a\sqrt{1-C^2},\quad{}y^2=x^2+a^2$'
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    '',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Особые решения дифференциальных уравнений',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Решение $y=\varphi(x)$  дифференциального уравнения 
->$F(x,y,y\')=0\quad{(1)}$<-
называется **особым**, если в каждой точке нарушается свойство единственности.

Геометрически это означает, что через каждую точку $(x_0,y_0)$ особого решения проходит не только оно,  но и другое решение, которое имеет в точке  $(x_0,y_0)$ ту же касательную, но не совпадает с данным особым решением в сколь угодно малой окрестности точки $(x_0,y_0)$.

График особого решения называется **особой интегральной кривой** уравнения $(1)$.

★ Особое решение дифференциального уравнения не описывается общим интегралом. Поэтому, оно не выводится из общего решения ни при каком значении постоянной $C$.

Опишем способы нахождения особых решений дифференциальных уравнений.

#### p-дискриминант

Если функция $F(x,y,y\')$ и ее частные производные $\frac{\partial{F}}{\partial{y}}$ и $\frac{\partial{F}}{\partial{y\'}}$ непрерывны по всем аргументам $x,y,y\'$, то особое решение находится из системы:
->$\begin{cases}F(x,y,y\')=0\\\frac{\partial{F}(x,y,y\')}{\partial{y\'}}=0\end{cases}$<-

Уравнение $\psi(x,y)=0$, получаемое при решении данной системы называется 
**p-дискриминантом** дифференциального уравнения. Соответствующая кривая, определенная этим уравнением, называется **p-дискриминантной кривой**. 

После нахождения p-дискриминантной кривой нужно проверить
- Является ли p-дискриминант решением заданного уравнения?
- Является ли p-дискриминант особым решением

Как проверить последнее условие?

Обозначим потенциальное особое решение за $y_2$

Найдем общее решение заданного уравнения, обозначим его  $y_1$

Запишем условия касания кривой особого решения $y_2$ и семейства интегральных кривых общего решения $y_1$ в произвольной точке $x_0$
->$\begin{cases}y_1(x_0)=y_2(x_0)\\\y_1\'(x_0)=y_2\'(x_0)\end{cases}$<-

Если данная система имеет решение, то $y_2$ будет являться особым решением.

★ Особое решение обычно соответствует огибающей семейства интегральных кривых общего решения дифференциального уравнения.

**Огибающая семейства интегральных кривых и $C$-дискриминант**.

**Огибающей** семейства кривых 
->$\Phi(x,y,C)=0\quad(2)$<-
называется такая кривая, которая в каждой своей точке касается некоторой кривой семейства $(2)$ и каждого отрезка которой касается бесконечное множество кривых из $(2)$.

Если $(2)$ есть общий интеграл уравнения $(1)$, то огибающая семейства кривых $(9)$, если она существует, будет особой интегральной кривой этого уравнения. Действительно, в точках огибающей значения $x,y,y\'$ совпадают со значениями $x,y,y\'$ для интегральной кривой, касающейся огибающей в точке $(x,y)$, и, следовательно, в каждой точке огибающей значения $x,y,y\'$ удовлетворяют уравнению $F(x,y,y\')=0$, т.е. огибающая является интегральной кривой.

В каждой точке огибающей нарушена единственность, так как через точки огибающей по одному направлению проходит по крайней мере две интегральные кривые: сама огибающая и касающаяся ее в рассматриваемой точке интегральная кривая семейства $(9)$. Следовательно, огибающая является особой интегральной кривой.

Огибающая входит в состав C-дискриминантной кривой (СДК), определяемой системой уравнений:
->$\begin{cases}\Phi(x,y,C)=0\\\frac{\partial\Phi(x,y,C)}{\partial{C}}=0\end{cases}$<-

Назовем достаточные условия того, что СДК будет огибающей:
1) На ней существуют, ограниченные по модулю, частные производные
->$\exists\space|\frac{\partial\Phi}{\partial{x}}|\leq{M},|\frac{\partial\Phi}{\partial{y}}|\leq{N},\quad{M,N}-const$<-

2) ->$|\frac{\partial\Phi}{\partial{x}}|\not=0\space\text{или}\space|\frac{\partial\Phi}{\partial{y}}|\not=0$<-

Рассмотрим **общий алгоритм нахождения особых решений**: одновременное использование p-дискриминанта и C-дискриминанта.

Определяем следующие уравнения:
- $\psi_p(x,y)=0$ уравнение p-дискриминанта 
- $\psi_C(x,y)=0$ уравнение C-дискриминанта

Рассмотрим структуру данных уравнений в общем случае.

->$\psi_p(x,y)=E*T^2*C=0$<-
->$\psi_C(x,y)=E*N^2*C^3$<-

Здесь:

- $E$ - уравнение огибающей
- $T$ - уравнение точек соприкосновения
- $C$ - уравнение точек заострения
- $N$ - уравнение узловых точек

Точки заострения, точки прикосновения и узловые точки являются внешними, то есть они не удовлетворяют дифференциальному уравнению и, поэтому, не являются особыми решениями дифференциального уравнения. Только уравнение огибающей будет являться особым решением. Поскольку огибающая входит в уравнения обоих дискриминантов в виде множителя в первой степени, то ее уравнение легко определяется из данной системы. 
',
        ]);

        $questions = [
            [
                'q' => 'Что называется огибающей семейства интегральных кривых?',
                't' => 'test_one',
                'a' => [
                    'Кривая, которая в каждой своей точке касается нескольких кривых данного семейства и каждого отрезка которой касается бесконечное множество кривых данного семейства',
                    'Кривая, которая в каждой своей точке касается некоторой кривой данного семейства и каждого отрезка которой касается бесконечное множество кривых данного семейства',
                    'Кривая, которая в каждой своей точке касается некоторой кривой данного семейства и каждой точки которой касается бесконечное множество кривых данного семейства',
                    'Кривая, которая в некоторой своей точке касается некоторой кривой данного семейства и каждого отрезка которой касается бесконечное множество кривых данного семейства',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Какое решение дифференциального уравнения называется особым?',
                't' => 'test_one',
                'a' => [
                    'В некоторой точке которого нарушается единственность',
                    'В некоторой точке которого нарушается непрерывность',
                    'В каждой точке которого нарушается существование',
                    'В каждой точке которого нарушается единственность',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Какие проверки необходимы для определения является ли решение особым, если известна p-дискриминантная кривая исходного уравнения?',
                'a' => [
                    'Непрерывна ли p-дискриминантная кривая',
                    'Является ли p-дискриминантная кривая решением',
                    'Касается ли данное решение в каждой своей точке какого-либо из общих решений',
                    'Обращается ли в 0 данное решение в какой-либо своей точке',
                ],
                'c' => [false, true, true, false]
            ],
            [
                'q' => 'На каие уравнения распадается уравнение СДК?',
                'a' => [
                    'Уравнение узловых точек',
                    'Уравнение огибающей',
                    'Уравнение точек заострения',
                    'Уравнение точек соприкосновения',
                ],
                'c' => [true, true, true, false]
            ],
            [
                'q' => 'На каие уравнения распадается уравнение p-дискриминанта?',
                'a' => [
                    'Уравнение узловых точек',
                    'Уравнение огибающей',
                    'Уравнение точек заострения',
                    'Уравнение точек соприкосновения',
                ],
                'c' => [false, true, true, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        //linear equasions
        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Основные понятия и определения',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Уравнение вида $a_0(x)y^{(n)}+a_1(x)y^{(n-1)}+..+a_{n-1}(x)y\'+a_n(x)y=\gamma(x)$ (*), где $a_1(x)..a_n(x), \gamma(x)$  непрерывные на (a,b) функции  называют линейным дифференциальным уравнением n-го порядка.

$\forall{x_0\in{(a,b)}}, \forall{y_0..y_{n-1}}\space\exists!$ решение  следующей задачи Коши:

$\begin{cases}
   a_o(x)y^{(n)}+a_1(x)y^{(n-1)}+..+a_{n-1}(x)y\'+a_n(x)y=\gamma(x) \\\
   y(x_0)=y_0 \\\
   y\'(x_0)=y_1 \\\
   : \\\
   y^{(n-1)}(x_0)=y_{n-1}
\end{cases}$

Приведем уравнение (*) к каноническому виду, для этого поделим обе его части на $a_0(x)$, получим:

$y^{(n)}+p_1(x)y^{(n-1)}+..+p_n(x)y=f(x), p_i(x)=\frac{a_i(x)}{a_0(x)}, f(x)=\frac{\gamma(x)}{a_0(x)}$ (1)

Пусть $L$ - линейный оператор, определяемый формулой:

$L(y)=y^{(n)}+p_1(x)y^{(n-1)}+..+p_n(x)y$

тогда уравнение (1) можно записать в виде:

$L[y]=f(x)$

Если $f(x)\equiv{0}$, то получим однородное уравнение:

$L[y]=0$ (2)

#### Свойства линейного оператора L.

1) $L[Cy]=CL[y]$, C - const
2) $L[y_1+y_2]=L[y_1]+L[y_2]$

#### Свойства линейного дифференциального уравнения.

1) Уравнение остается линейным при любой замене независимой переменной x.

2) Уравнение остается линейным при линейной замене неизвестной функции $y$, т.е. $y=a(x)z(x)+b(x)$, где $a(x),b(x),z(x)$ - непрерывно дифференцируемые n раз функции.

#### Свойства решений линейного однородного дифференциального уравнения (2)

1) Если y=y(x) - решение уравнения (2), то функция $y_1(x)=Cy(x)$, C - const, также решение уравнения (2).

2) Если $y_1(x)$ и $y_2(x)$ решения уравнения (2), то $y_1(x)+y_2(x)$, также решение уравнения (2).

3) Если $y_1(x)..y_n(x)$ - решения уравнения (2), то функция $y=C_1y_1(x)+..+C_ny_n(x)$, также решение уравнения (2).

',
            //'video' => 'defs.mp4'
        ]);

        $questions = [
            [
                'q' => 'Сколько особых решений может иметь линейное дифференциальное уравнение n-го порядка?',
                'a' => [
                    '1',
                    '0',
                    '2',
                    'Это определяется в зависимости от уравнения',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'При какой замене независимой переменной x линейное дифференциальное уравнение n-го порядка останется линейным?',
                'a' => [
                    'При линейной',
                    'При замене на константу',
                    'При любой замене',
                    'Таких замен не существует',
                ],
                'c' => [true, true, true, false]
            ],
            [
                'q' => 'При какой замене неизвестной функции y линейное дифференциальное уравнение n-го порядка останется линейным?',
                'a' => [
                    'При линейной',
                    'При замене на константу',
                    'При любой замене',
                    'Таких замен не существует',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Если $y(x)$ - решение линейного однородного дифференциального уравнения $L[y]=0$, то какие еще функции точно будут его решениями',
                'a' => [
                    '$y=y^2(x)$',
                    '$y=Cy(x)$, C - const',
                    '$y=t(x)y(x), t(x)$ - линейная функция',
                    '$y=\frac{1}{y(x)}$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Если $y_1(x),y_2(x)$ - решения линейного однородного дифференциального уравнения $L[y]=0$, то какие еще функции точно будут его решениями',
                'a' => [
                    '$y=y_1(x)+y_2(x)$',
                    '$y=y_1(x)-y_2(x)$',
                    '$y=C_1y_1(x)+C_2y_2(x),C_1,C_2$ - const',
                    '$y=\frac{y_1(x)}{y_2(x)}$',
                    '$y=y_1(x)y_2(x)$',
                ],
                'c' => [true, true, true, false, false]
            ],
            [
                'q' => 'Сколько решений задачи Коши $y(x_0)=y_0,y\'(x_0)=y\'_0,..,y^{(n-1)}(x_0)=y^{(n-1)}_0$ имеет линейное дифференциальное уравнение n-го порядка',
                'a' => [
                    '1',
                    '2',
                    '0',
                    'много',
                ],
                'c' => [true, false, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Понятие линейной независимости функций',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Функции $y_1(x)..y_n(x), x\in(a,b)$ называются линейно независимыми, если равенство $\alpha_1y_1(x)+..+\alpha_ny_n(x)=0$ справедливо только в случае, когда $\alpha_1=..=\alpha_n=0, \alpha_i-const, i=\overline{1,n}$, в противном случае функции $y_1(x)..y_n(x)$ называются линейно зависимыми.

Функции $y_1(x)..y_n(x), x\in(a,b)$ называются линейно зависимыми, если $\exists\space\alpha_1..\alpha_n$, не все равные нулю и такие что равество $\alpha_1y_1(x)+..+\alpha_ny_n(x)=0$ справедливо.

Пусть функции $y_1(x)..y_n(x)$ имеют производные до n-го порядка включительно, тогда определитель вида

$W(y_1..y_n)=W(x)=\begin{vmatrix}
   y_1(x) & y_2(x) & .. & y_n(x) \\\
   y_1\'(x) & y_2\'(x) & .. & y_n\'(x) \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & y_n^{(n-1)}(x)
\end{vmatrix}$

называется определителем Вронского.

**Теорема.** Если функции $y_1..y_n$ линейно зависимы в интервале $(a,b)$, то $W(y_1..y_n)=0\space\forall{x\in{(a,b)}}$.

*Доказательство:*

$y_1..y_n$ линейно зависимы $\implies\alpha_1y_1+...+\alpha_ny_n=0,\space\alpha_1^2+...+\alpha_n^2\not=0$

Пусть $\alpha_n\not=0$, тогда $y_n=-\frac{\alpha_1}{\alpha_n}y_1-...-\frac{\alpha_{n-1}}{\alpha_n}y_{n-1}$

Тогда определитель Вронского имеет вид:
->$W(x)=\begin{vmatrix}
   y_1(x) & y_2(x) & .. & -\frac{\alpha_1}{\alpha_n}y_1-...-\frac{\alpha_{n-1}}{\alpha_n}y_{n-1} \\\
   y_1\'(x) & y_2\'(x) & .. & -\frac{\alpha_1}{\alpha_n}y\'_1-...-\frac{\alpha_{n-1}}{\alpha_n}y\'_{n-1} \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & -\frac{\alpha_1}{\alpha_n}y^{(n-1)}_1-...-\frac{\alpha_{n-1}}{\alpha_n}y^{(n-1)}_{n-1}
\end{vmatrix}$<-

Сперва, вспомним некоторые свойства определителя, а именно:
- $\begin{vmatrix}a_1&b_1+c_1\\\a_2&b_2+c_2\end{vmatrix}=\begin{vmatrix}a_1&b_1\\\a_2&b_2\end{vmatrix}+\begin{vmatrix}a_1&c_1\\\a_2&c_2\end{vmatrix}$
- Если определитель содержит два одинаковых столбца, то он равен нулю

Теперь разобьём полученный определитель на сумму определителей:

$W(x)=-\frac{\alpha_1}{\alpha_n}\begin{vmatrix}
   y_1(x) & y_2(x) & .. & y_1(x) \\\
   y_1\'(x) & y_2\'(x) & .. & y_1\'(x) \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & y_1^{(n-1)}(x)
\end{vmatrix}-...-\frac{\alpha_{n-1}}{\alpha_n}\begin{vmatrix}
   y_1(x) & y_2(x) & .. & y_{n-1}(x) \\\
   y_1\'(x) & y_2\'(x) & .. & y_{n-1}\'(x) \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & y_{n-1}^{(n-1)}(x)
\end{vmatrix}=-\frac{\alpha_1}{\alpha_n}0-...-\frac{\alpha_{n-1}}{\alpha_n}0=0$ ∎

**Теорема.** Если $y_1(x)..y_n(x)$ - линейно независимые решения уравнения $L[y]=0$, то  $W(y_1..y_n)\not=0\space\forall{x\in{(a,b)}}$.

*Доказательство:* От противного. Допустим  $\exists\space{x_0}\in(a,b):\space{W}[y_1(x_0)...y_n(x_0)]=W(x_0)=0$

Зададим условия задачи Коши для уравнения $L[y]=0$:

$\begin{cases}y(x_0)=0\\\y\'(x_0)=0\\\...\\\y^{(n-1)}(x_0)=0\end{cases}\quad(*)$

$y=0$ - очевидное решение этой задачи Коши.

Рассмотрим функцию $y=C_1y_1+...+C_ny_n$ - это линейная комбинация решений заданного уравнения, поэтому также является его решением. Подставим эту функцию в условия $(*)$:
$\begin{cases}C_1y_1(x_0)+...+C_ny_n(x_0)=0\\\C_1y\'_1(x_0)+...+C_ny\'_n(x_0)=0\\\...\\\C_1y^{(n-1)}_1(x_0)+...+C_ny^{(n-1)}_n(x_0)=0\end{cases}$

Получили алгебраическую систему относительно $C_1...C_n$.

 Заметим, что ее определитель является определиелем Вронского $W(x_0)$, который по предположению равен $0$:
 
 $\Delta=\begin{vmatrix}
   y_1(x) & y_2(x) & .. & y_n(x) \\\
   y_1\'(x) & y_2\'(x) & .. & y_n\'(x) \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & y_n^{(n-1)}(x)
\end{vmatrix}=W(x_0)=0$

$\implies$  $\exists\space{C_1^*..C_n^*}$ - ненулевое решение $\implies{y}=C_1^*y_1+...+C_n^*y_n\not=0$ - решение заданной нами ранее задачи Коши с условиями $(*)$.

Таким образом получили, что задача Коши имеет 2 решения, что противоречит теореме Пикара (о единственности решения задачи Коши). ∎

**Теорема.** Пусть $y_1(x)..y_n(x)$ - решения уравнения $L[y]=0$, тогда либо $W(y_1..y_n)=0$, либо $W(y_1..y_n)\not=0$, ни в одной точке интервала непрерывности коэффициентов уравнения.

**Фундаментальной системой (ФСР)** линейного однородного дифференциального уравнения n-го порядка называется система n линейно независимых решений этого уравнения.

**Теорема.** ФСР существует для любого линейного дифференциального уравнения.

Все решения линейного однородного уравнения n-го порядка образуют линейное пространство, базисом которого является любая ФСР этого уравнения.

**Теорема.** Если $y_1..y_n$ - ФСР уравнения $L[y]=0$, то его общее решение $C_1y_1+..+C_ny_n, C_1..C_n-const$.

*Доказательство:* Пусть  $y_1...y_n$ - ФСР уравнения $L[y]=0\space(1)$, тогда линейная комбинация $C_1y_1+..+C_ny_n\space(3), C_1..C_n-const$ решений из ФСР, также решение.

Зададим условия задачи Коши для уравнения $(1)$:

$\begin{cases}y(x_0)=y_0\\\y\'(x_0)=y_0\\\...\\\y^{(n-1)}(x_0)=y_0^{(n-1)}\end{cases}\quad(2)$

 где  $x_0\in{(a,b)},y_0...y_0^{(n-1)}-$ любые заданные числа
 
 Нужно показать, что любое частное решение может быть получено из $(3)$
 
 Подставим $(3)$ в условия $(2)$:
 
 $\begin{cases}C_1y_1(x_0)+..+C_ny_n(x_0)=y_0\\\C_1y\'_1(x_0)+..+C_ny\'_n(x_0)=y_0\\\...\\\C_1y_1^{(n-1)}(x_0)+..+C_ny_n^{(n-1)}(x_0)=y_0^{(n-1)}\end{cases}$
 
Получили СЛАУ относительно $C_1...C_n$
Заметим, что определитель данной системы есть определитель Вронского:

 $\Delta=\begin{vmatrix}
   y_1(x) & y_2(x) & .. & y_n(x) \\\
   y_1\'(x) & y_2\'(x) & .. & y_n\'(x) \\\
   : & : & : & : \\\
   y_1^{(n-1)}(x) & y_2^{(n-1)}(x) & .. & y_n^{(n-1)}(x)
\end{vmatrix}=W[y_0..y_n]$$\not=0$

$\implies{C_1^*...C_n^*}$ - ненулевое решение $\implies$ $y(x)=C_1^*y_1+....+C_n^*y_n$ - частное решение.


**Теорема.** Всякие $n+1$ решений уравнения $L[y]=0$ линейно зависимы.

*Доказательство:* Пусть $y_1...y_ny_{n+1}$ - решения уравнения $L[y]=0\space(4)$.

Если $y_1...y_n$ - линейно зависимы, тогда $\alpha_1y_1+...+\alpha_ny_n=0,\space\alpha_1^2+...+\alpha_n^2\not=0$. Тогда после добавления к данной линейной комбинации слагаемое  $0*y_{n+1}$, она останется линейно независимой.

Если $y_1...y_n$ - линейно независимы, тогда они образуют ФСР, тогда любое другое решение является их линейной комбинацией, в том числе $y_{n+1}$, значит решения $y_1...y_ny_{n+1}$ линейно зависимы.
',
            'examples' => '1) Исследовать являются ли функции $1, \sin(2x), (\sin(x)-\cos(x))^2$ линейно независимыми.

Данные функции определены $\forall{x\in{(-\infty, +\infty)}}$.

Если данная система линейно зависима то найдутся такие $a_1,a_2,a_3$, не все равные нулю, что для всех $x$ выполняется тождество $a_1+a_2\sin(2x)+a_3(\sin(x)-\cos(x))^2=0$ (1).

Упростим выражение, раскрыв скобки и приведя подобные слагаемые (1), получим:

$a_1-a_2sin(2x)+a_3=0$ или $\sin(2x)=\frac{a_1+a_3}{a_2}$

Для любых $x$, можно подобрать такие значения $a_1, a_2, a_3$, чтобы последнее равенство обращалось в верное тождество, значит функции $1, \sin(2x), (\sin(x)-\cos(x))^2$ линейно зависимы.

2) Найти определитель Вронского для системы функций $y_1=\pi,y_2=\arcsin(x),y_3=\arccos(x)$

$W[y_1,y_2,y_3]=\begin{vmatrix}
   \pi & \arcsin(x) & \arccos(x) \\\
   0 & (1-x^2)^{-\frac{1}{2}} & -(1-x^2)^{-\frac{1}{2}} \\\
   0 & x{(1-x^2)^{-\frac{3}{2}}} & -x{(1-x^2)^{-\frac{3}{2}}}
\end{vmatrix}=\pi{*}(-x(1-x^2)^{-2}+x(1-x^2)^{-2})=\pi{*0}=0$

Можем сделать вывод что данная система функций линейно зависима.
'
        ]);

        $questions = [
            [
                'q' => 'Чему равен определитель Вронского функций $y_1(x)..y_n(x)$ для $x\in{(a,b)}$, если они линейно зависимы в $(a,b)$?',
                'a' => [
                    'Все зависит от функций',
                    '0',
                    '1',
                    '$\infty$',
                    '$\frac{a+b}{2}$',
                ],
                'c' => [false, true, false, false, false]
            ],
            [
                'q' => 'Может ли определитель Вронского ФСР линейного однородного дифференциального уравнения обратиться в ноль в какой-нибудь точке задания уравнения?',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [false, true]
            ],
            [
                'q' => 'Какой вид имеет общее решение однородного дифференциального уравнения, если $y_1..y_n$ - его ФСР?',
                'a' => [
                    '$y_1+..+y_n$',
                    '$C_1y_1+..+C_ny_n, C_i-const, i=\overline{1,n}$',
                    '$y_1+..+y_n+y_r, y_r-$ частное решение',
                    'Здесь нет правильного ответа',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Если  $y_1..y_n,y_{n+1}$ - решения линейного однородного дифференциального уравнения, то какие выводы можно сделать?',
                'a' => [
                    'Одно из данных решений является линейной комбинацией других',
                    'Эти решения линейно независимы',
                    'Эти решения линейно зависимы',
                    '$y_1..y_n$ составляют ФСР',
                    'Каждое из данных решений можно получить линейной комбинацией других',
                ],
                'c' => [true, false, true, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Линейные однородные уравнения с постоянными коэффициентами',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '### Линейные однородные уравнения с постоянными коэффициентами.

Рассмотрим дифференциальное уравнение $a_0y^{(n)}+a_1y^{(n-1)}+..+a_n=0$ (1), где $a_0..a_n\in{R}, a_0\not=0$

Будем искать общее решение уравнения (1)

Составим характеристическое уравнение для уравнения (1):

$a_0\lambda^n+a_1\lambda^{n-1}+...+a_{n-1}\lambda+a_n=0$ (2)

Пусть $\lambda_1..\lambda_n$ - корни уравнения (2), тогда рассмотрим виды общего решения $y_0$ уравнения (2) в зависимости от их значений

1) $\lambda_1..\lambda_n$ вещественные и различные, тогда

ФСР={ $e^{\lambda_1x},e^{\lambda_2x},...e^{\lambda_nx}$ }

$y_0=C_1e^{\lambda_1x}+C_2e^{\lambda_2x}+...+C_ne^{\lambda_nx}$

2) $\lambda_1..\lambda_n$ вещественные, но среди них имеются кратные.

Пусть $\lambda_1=\lambda_2=...=\lambda_k=\tilde{\lambda}$ - k-кратные решения уравнения (1), а все остальные n-k корней различные, тогда
ФСР={ $e^{\tilde{\lambda}x},xe^{\tilde{\lambda}x},x^2e^{\tilde{\lambda}x},..,x^{k-1}e^{\tilde{\lambda}x},e^{\lambda_{k+1}x},..,e^{\lambda_nx}$ }

$y_0=(C_1+xC_2+x^2C_3+..+x^{k-1}C_{k-1})e^{\tilde{\lambda}x}+C_{k+1}e^{\lambda_{k+1}x}+..+C_ne^{\lambda_nx}$

3) Среди $\lambda_1..\lambda_n$ есть комплексные.

Пусть например $\lambda_1=\alpha+i\beta, \lambda_2=\alpha-i\beta, \lambda_3=\gamma+i\delta, \lambda_4=\gamma-i\delta$, а остальные $n-4$ корней вещественные, тогда

ФСР={ $e^{\alpha{x}}cos(\beta{x}),e^{\alpha{x}}sin(\beta{x}),e^{\gamma{x}}cos(\delta{x}),e^{\gamma{x}}sin(\delta{x}),e^{\lambda_5x},..,e^{\lambda_nx}$ }

$y_0=e^{\alpha{x}}(C_1cos(\beta{x})+C_2sin(\beta{x}))+e^{\gamma{x}}(C_3cos(\delta{x})+C_4sin(\delta{x}))+C_5e^{\lambda_5x}+..+C_ne^{\lambda_nx}$

4) Среди $\lambda_1..\lambda_n$ имеются кратные комплексные корни

Пусть например $\lambda_1=\alpha+i\beta$ - k-кратный корень, тогда $\lambda_2=\alpha-i\beta$, также будет k-кратным корнем и тогда

ФСР={ $e^{\alpha{x}}cos(\beta{x}),e^{\alpha{x}}sin(\beta{x}),xe^{\alpha{x}}cos(\beta{x}),xe^{\alpha{x}}sin(\beta{x}),..,x^{k-1}e^{\alpha{x}}cos(\beta{x}),x^{k-1}e^{\alpha{x}}sin(\beta{x}),e^{\lambda_{2k+1}x},..,e^{\lambda_nx}$ }

$y_0=e^{\alpha{x}}(C_1+C_3x+C_5x^2+..+C_{k-1}x^{k-1})cos(\beta{x})+e^{\alpha{x}}(C_2+C_4x+C_6x^{k+2}+..+C_{2k}x^{2k})sin(\beta{x})+e^{\lambda_{2k+1}x}+..+e^{\lambda_nx}$',
            'examples' => '1) Составить линейное однородное уравнение, если его характеристическое уравнение $2\lambda^2-3\lambda-5=0$.

$2y\'\'-3y\'-5y=0$

2) Составить линейное однородное дифференциальное уравнение если его ФСР$=\lbrace{1,e^{-x}\sin(x),e^{-x}\cos(x)}\rbrace$

Найдем корни соответствующего характеристического уравнения.

Для 1: $\lambda_1=0$.

Для $e^{-x}\sin(x)$: $\lambda_2=-1-i$

Для $e^{-x}\cos(x)$: $\lambda_3=-1+i$

Тогда характеристическое уравнение: $\lambda(\lambda+1+i)(\lambda+1-i)=0$ или $\lambda^3+2\lambda^2+2\lambda$

А дифференциальное уравнение: $y^{(3)}+2y\'\'+2y\'$

3) Проинтегрировать уравнение $y^{(4)}+4y^{(3)}+10y\'\'+12y\'+5y=0$

Составим характеристическое уравнение: $\lambda^4+4\lambda^3+10\lambda^2+12\lambda+5=0$

Его корни $\lambda_1=\lambda_2=-1,\space\lambda_3=-1+2i,\space\lambda_4=-1-2i$

Тогда общее решение дифференциального уравнения:

$(C_1+C_2x)e^{-x}+(C_3\cos(2x)+C_4\sin(2x))e^{-x}$.

4) Решить задачу Коши $y\'\'\'+y\'\'=0,\space{y(0)=1},\space{y\'(0)=0},\space{y\'\'(0)=1}$

Составим соответствующее характеристическое уравнение: $\lambda^3+\lambda^2=0$.

Его корни: $\lambda_1=\lambda_2=0,\space\lambda_3=-1$.

Тогда общее решение дифференциального уравнения: $y=C_1+C_2x+C_3e^{-x}$.

Найдем $y\', y\'\'$:

$y\'=C_2-C_3e^{-x}$
$y\'\'=C_3e^{-x}$

Найдем значения $C_1,C_2,C_3$, удовлетворяющие условиям задачи Коши, для этого решим систему:
->$\begin{cases}
	C_1+C_2*0+C_3*e^0=1 \\\
  C_2-C_3*e^0=0 \\\
  C_3*e^0=1
\end{cases}\space\begin{cases}
	C_1=0 \\\
  C_2=0 \\\
  C_3=1
\end{cases}$<-

Получили решение задачи Коши: $y=e^{-x}$'
        ]);

        $questions = [
            [
                'q' => 'Найдите ФСР уравнения $y\'\'+2y\'+y=0$',
                't' => 'test_one',
                'a' => [
                    '$\lbrace{x^2,x}\rbrace$',
                    '$\lbrace{e^x,xe^x}\rbrace$',
                    '$\lbrace{e^{-x},xe^{-x}}\rbrace$',
                    '$\lbrace{e^{-x}}\rbrace$',
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Найдите ФСР уравнения $y\'\'\'+6y\'\'+11y\'+6y=0$',
                't' => 'test_one',
                'a' => [
                    '$\lbrace{e^{3x},e^x\sin{(2x)},e^x\cos{(2x)}\rbrace$',
                    '$\lbrace{e^{-3x},e^{-2x},e^x}\rbrace$',
                    '$\lbrace{e^{-3x},e^{-2x},e^{-x}}\rbrace$',
                    '$\lbrace{e^{3x},e^{2x},e^{x}}\rbrace$',
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Найдите ФСР уравнения $4y\'\'-8y\'+5y=0$',
                't' => 'test_one',
                'a' => [
                    '$\lbrace{e^x,e^{\frac{x}{2}}}\rbrace$',
                    '$\lbrace{e^{\frac{x}{2}}\sin{x},e^{\frac{x}{2}}\cos{x}}\rbrace$',
                    '$\lbrace{e^{-x},e^{-\frac{x}{2}}}\rbrace$',
                    '$\lbrace{e^x\sin{\frac{x}{2}},e^x\cos{\frac{x}{2}}}\rbrace$',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Восстановите уравнение по ФСР $\lbrace{e^x,\sin{x},\cos{x}}\rbrace$',
                't' => 'test_one',
                'a' => [
                    '$y\'\'\'-y\'\'+y-1=0$',
                    '$y\'\'\'-y\'\'+y-2=0$',
                    '$y\'\'\'-y\'\'+y+1=0$',
                    '$y\'\'\'+2y\'\'+y-1=0$',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Восстановите уравнение по ФСР $\lbrace{e^x,xe^x}\rbrace$',
                't' => 'test_one',
                'a' => [
                    '$y\'\'\'-3y\'\'+2y\'+y=0$',
                    '$y\'\'\'+3y\'\'+2y\'+y=0$',
                    '$y\'\'+2y\'+y=0$',
                    '$y\'\'-2y\'+y=0$',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Восстановите уравнение по ФСР $\lbrace{e^{2x}, xe^{2x}, x^2e^{2x}, e^x\sin{x}, e^x\cos{x}}\rbrace$',
                't' => 'test_one',
                'a' => [
                    '$y^{(5)}+8y^{(4)}+20y\'\'\'+16y\'\'+32y-16=0$',
                    '$y^{(5)}-7y^{(4)}+20y\'\'\'-32y\'\'+32y-16=0$',
                    '$7y^{(4)}+32y\'\'\'-32y\'\'+32y-7=0$',
                    '$y^{(5)}-7y^{(4)}+20y\'\'\'-32y\'\'+32y-32=0$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Проинтегрировать уравнение $y\'\'+2y\'+1y=0$',
                't' => 'test_one',
                'a' => [
                    '$C_1\sin{x}+C_2\cos{x}$',
                    '$(C_1+C_2x)e^{-x}$',
                    '$C_1xe^x+C_2xe^{-x}$',
                    '$C_1e^{-x}$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Проинтегрировать уравнение $y\'\'-y\'+2y=0$',
                't' => 'test_one',
                'a' => [
                    '$C_1e^x\cos{x}+C_2e^x\sin{x}$',
                    '$C_1e^x(\cos{x}+\sin{x})$',
                    '$C_1e^{x}+C_2e^{-x}$',
                    '$C_1xe^x-C_2xe^{-x}$',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Проинтегрировать уравнение $y\'\'\'-10y\'\'+37y\'-72y=0$',
                't' => 'test_one',
                'a' => [
                    '$C_1e^{3x}+C_2e^{4x}cos(2x)+C_3e^{4x}sin(2x)$',
                    '$C_1e^{4x}+C_2e^{2x}cos(3x)+C_3e^{2x}sin(3x)$',
                    '$yC_1e^{4x}+C_2e^{3x}e^{2x}+C_3e^{3x}e^{2x}$',
                    '$C_1e^{4x}+C_2e^{3x}cos(2x)+C_3e^{3x}sin(2x)$',
                ],
                'c' => [false, false, false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Линейные неоднородные уравнения с постоянными коэффициентами',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Рассмотрим дифференциальное уравнение $a_0y^{(n)}+a_1y^{(n-1)}+..+a_n=f(x)$ (3), где $a_0..a_n\in{R}, a_0\not=0$

**Теорема.** Общее решение неоднородного уравнения (3) равно сумме общего решения соответствующего однородного уравнения и какого-либо частного решения неоднородного уравнения.

Рассмотрим некоторые способы нахождения частного решения неоднородного уравнения.

1) Метод подбора.

Если правая часть уравнения (3) имеет вид
->$f(x)=e^{\alpha{x}}(P_l(x)cos(\beta{x})+Q_m(x)sin(\beta{x}))$,<-
где $P_l(x)$ и $Q_m(x)$ - многочлены степени l и m соответственно, то можно искать частное решение уравнения (3) в виде:

->$y_1(x)=x^se^{\alpha{x}}(\tilde{P_k}(x)cos(\beta{x})+\tilde{Q_k}(x)sin(\beta{x}))$,<-
где $k=max(m,l), \tilde{P_k}(x),\tilde{Q_k}(x)$ - многочлены от x k-й степени, а s-кратность корня $\lambda=\alpha+i\beta$ характеристического уравнения.

Покажем на схемах как действовать в некоторых случаях.
Вид схемы: $\boxed{\text{вид правой части}}\longrightarrow\begin{cases}
   \text{решение, если нет указанных корней соответствующего однородного уравнения}   \\\
   \text{решение, если есть указанные корни соответствующего однородного уравнения}
\end{cases}$

$\boxed{P_m(x)}\longrightarrow\begin{cases}
   \tilde{P_m}(x) &\text{если 0 не корень }   \\\
   x^s\tilde{P_m}(x) &\text{если 0 корень }
\end{cases}$

$\boxed{P_m(x)e^{\alpha{x}}}\longrightarrow\begin{cases}
   \tilde{P_m}(x)e^{\alpha{x}} &\text{если}\space\alpha\space\text{не корень }   \\\
   x^s\tilde{P_m}(x)e^{\alpha{x}} &\text{если}\space\alpha\space\text{корень }
\end{cases}$

$\boxed{P_n(x)cos(\beta{x})+Q_m(x)sin(\beta{x})}\longrightarrow\begin{cases}
   \tilde{P_k}(x)cos(\beta{x})+\tilde{Q_k}(x)sin(\beta{x}),k=max(m,n) &\text{если}\space\mp{i\beta}\space\text{не корни }   \\\
   x^s(\tilde{P_k}(x)cos(\beta{x})+\tilde{Q_k}(x)sin(\beta{x})),k=max(m,n) &\text{если}\space\mp{i\beta}\space\text{корни }
\end{cases}$

$\boxed{e^{\alpha{x}}(P_n(x)cos(\beta{x})+Q_m(x)sin(\beta{x}))}\longrightarrow\begin{cases}
   e^{\alpha{x}}(\tilde{P_k}(x)cos(\beta{x})+\tilde{Q_k}(x)sin(\beta{x})),k=max(m,n) &\text{если}\space\alpha\mp{i\beta}\space\text{не корни }   \\\
   x^se^{\alpha{x}}(\tilde{P_k}(x)cos(\beta{x})+\tilde{Q_k}(x)sin(\beta{x})),k=max(m,n) &\text{если}\space\alpha\mp{i\beta}\space\text{корни }
\end{cases}$

**Теорема** Если $y_j(x)$ - решение уравнения $a_0(x)y^{(n)}+a_1(x)y^{(n-1)}+..+a_n(x)y=f_k(x), k=\overline{1,m}$, то функция $y(x)=\displaystyle\sum_{k=1}^{m}{y_k(x)}$ является решением уравнения $a_0(x)y^{(n)}+a_1(x)y^{(n-1)}+..+a_n(x)y=\displaystyle\sum_{k=1}^{m}{f_k(x)}$.

### Уравнение Эйлера.

Линейные уравнения вида $C_0x^ny^{(n)}+C_1x^{n-1}y^{(n-1)}+..+C_{n-1}xy\'+C_ny=0$ (4), $C_i-const, i=\overline{1,n}$ называют **уравнениями Эйлера**.

Заменой $x=e^t$ уравнение (4) преобразуется в линейное однородное уравнение

Если в уравнениии (4) вместо x буде выражение вида $ax+b$, то такое уравнение тоже называется Эйлеровым, и тогда делаем замену $ax+b=e^t$.',
            'examples' => '1) Решить уравнение $y\'\'+4y\'+3y=9e^{-3x}$

Найдем общее решение соответствующего однородного уравнения $y\'\'+4y\'+3y=0$ (*), получим: $y_0=C_1e^{-x}+C_2e^{-3x}$

$x=-3$ является корнем характеристического уравнения, соответствующего однородному уравнению (*), поэтому частное решение имеет вид $y_1=axe^{-3x}$.

Тогда
$\begin{aligned}
   &y_1\'=ae^{-3x}-3axe^{-3x}\\\
   &y_1\'\'=-6ae^{-3x}+9axe^{-3x}
\end{aligned}$

Найдем параметр a, подставив частное решение $y_1$ и его производные в неоднородное уравнение:

$-2ae^{-3x}=9e^{-3x}$, тогда  $a=-4,5$

Таким образом частное решение $y_1=-4,5xe^{-3x}$

И общее решение неоднородного уравнения: $y=y_0+y_1=C_1e^{-x}+C_2e^{-3x}-4,5xe^{-3x}$

2) Решить уравнение $y\'\'-5y\'+6y=10(1-x)e^{-2x}$

Найдем общее решение соответствующего однородного уравнения $y\'\'-5y\'+6y=0$ (*), получим: $y_0=C_1e^{2x}+C_2e^{3x}$

$x=-2$ не является корнем характеристического уравнения, соответствующего однородному уравнению (*), частное решение имеет вид $y_1=(ax+b)e^{-2x}$.

Тогда
$\begin{aligned}
   &y_1\'=ae^{-2x}-2(ax+b)e^{-2x}\\\
   &y_1\'\'=-4ae^{-2x}+4(ax+b)e^{-2x}
\end{aligned}$

Найдем параметры a и b, подставив частное решение $y_1$ и его производные в неоднородное уравнени и приравняв коэффициенты одинаковых элементов:

$-9ae^{-2x}+20(ax+b)e^{-2x}=10(1-x)e^{-2x}$, тогда  
$\begin{cases}
	-9a+20b=10\\\
  20a=-10
\end{cases},\space\begin{cases}
	a=-\frac{1}{2}\\\
  b=\frac{11}{40}
\end{cases}$

Таким образом частное решение $y_1=(-\frac{1}{2}x+\frac{11}{40})e^{-2x}$

И общее решение неоднородного уравнения: $y=y_0+y_1=C_1e^{2x}+C_2e^{3x}+(-\frac{1}{2}x+\frac{11}{40})e^{-2x}$

3) Решить уравнение $y\'\'+2y\'+5y=e^{-x}\sin(2x)$

Найдем общее решение соответствующего однородного уравнения $y\'\'+2y\'+5y=0$ (*), получим: $y_0=e^{-x}(C_1\cos(2x)+C_2\sin(2x))$

$x=-1-2i$ является корнем характеристического уравнения, соответствующего однородному уравнению (*), поэтому частное решение имеет вид $y_1=xe^{-x}(a\sin(2x)+b\cos(2x))$.

Тогда
$\begin{aligned}
   &y_1\'=(e^{-x}-xe^{-x})(a\sin(2x)+b\cos(2x))+2xe^{-x}(a\cos(2x)-b\sin(2x))\\\
   &y_1\'\'=(-2e^{-x}-3xe^{-x})(a\sin(2x)+b\cos(2x))+4(e^{-x}-xe^{-x})(a\cos(2x)-b\sin(2x))
\end{aligned}$

Подставим частное решение $y_1$ и его производные в неоднородное уравнение и приведем подобные слагаемые.

$4e^{-x}(a\cos(2x)-b\sin(2x))=e^{-x}\sin(2x)$

Найдем коэффициенты $a,\space{b}$, приравняв коэффициенты при одинаковых элементах (т.е. $e^{-x}\sin(2x),\space{}e^{-x}\cos(2x)$) в правой левой частях последнего равенства:

$\begin{cases}
	4a=0\\\
  -4b=1
\end{cases}\space\begin{cases}a=0\\\b=-\frac{1}{4}\end{cases}$

Таким образом частное решение $y_1=-\frac{1}{4}xe^{-x}\cos(2x)$

И общее решение неоднородного уравнения: $y=y_0+y_1=e^{-x}(C_1\cos(2x)+C_2\sin(2x))-\frac{1}{4}xe^{-x}\cos(2x)$

4) Решить уравнение $y\'\'+4y\'+3y=9e^{-3x}+cos(x)$

Здесь воспользуемся принципом суперпозиции для нахождения частного решения: Если $y_1$ и $y_2$ - частные решения уравнений $L[x]=f_1(x)$ и $L[x]=f_2(x)$, то и $y_1+y_2$ частное решение уравнения $L[x]=f_1(x)+f_2(x)$.

Уравнение $y\'\'+4y\'+3y=9e^{-3x}$ мы уже решали первым в этом пункте и нашли частное решение $y_1=-4,5xe^{-3x}$.

Найдем частное решение для  $y\'\'+4y\'+3y=cos(x)$, оно имеет вид $y_2=a\cos(x)+b\sin(x)$ и его производные: 

$\begin{aligned}
   &y_1\'=-a\sin(x)+b\cos(x)\\\
   &y_1\'\'=-a\cos(x)-b\sin(x)
\end{aligned}$

Подставляем в неоднородное уравнение $y\'\'+4y\'+3y=cos(x)$, тогда

$2a\cos(x)+2b\sin(x)-4a\sin(x)+4b\cos(x)=cos(x)$

Решаем систему:

$\begin{cases}2a+4b=1\\\2b-4a=0\end{cases}\space{}\begin{cases}a=\frac{1}{10}\\\b=\frac{1}{5}\end{cases}$

Получаем $y_2=\frac{1}{10}\cos(x)+\frac{1}{5}\sin(x)$

Таким образом общее решение уравнения $y\'\'+4y\'+3y=9e^{-3x}+cos(x)$:

$y=y_0+y_1+y_2=C_1e^{-x}+C_2e^{-3x}-4,5xe^{-3x}+0,1\cos(x)+0,2\sin(x)$

### Уравнение Эйлера

1) Решить однородное уравнение Эйлера $x^2y\'\'+3xy\'+y=0$

Сделаем замену $x=e^t$ и составим характеристическое уравнение для уравнения Эйлера.

$\lambda(\lambda-1)+3\lambda+1=0$ или $(\lambda+1)^2=0$

Его корни: $\lambda_1=\lambda_2=-1$

И тогда общее решение: $y=(C_1+C_2t)e^{-t}$

Теперь возвратимся к $x$, тогда $y=(C_1+C_2ln|x|)\frac{1}{x}$

2) Решить неоднородное уравнение Эйлера $(x+1)^3y\'\'+3(x+1)^2y\'+(x+1)y=6ln(x+1)$

Поделим уравнение на $(x+1)$: $(x+1)^2y\'\'+3(x+1)y\'+y=\frac{6}{x+1}ln(x+1)$

Сделаем замену $(x+1)=e^t$ и составим характеристическое уравнение, для соответствующего однородного уравнения:

$\lambda(\lambda-1)+3\lambda+1=0$ или $(\lambda+1)^2=0$,

Тогда общее решение однородного уравнения $y_0=(C_1+C_2t)e^{-t}$

Восстановим по характеристиескому уравнению и правой части исходного уравнения новое неоднородное уравнение: $y\'\'+2y\'+y=6te^{-t}$

$x=-1$ - двухкратный корень характеристического уравнения и поэтому частное решение последнего неоднородного уравнения  имеет вид $y_1=t^2(at+b)e^{-t}$.

Найдем $y_1\',y_1\'\'$:

$\begin{aligned}
   &y_1\'=e^{-t}(-at^3+3at^2-bt^2+2bt)\\\
   &y_1\'\'=e^{-t}(at^3-6at^2+bt^2+6at-4bt+2b)
\end{aligned}$

Тогда: $e^{-t}(at^3-6at^2+bt^2+6at-4bt+2b+2(-at^3+3at^2-bt^2+2bt)+t^2(at+b))=6te^{-t}$

Решаем систему:

$\begin{cases}
  6a=6\\\
  2b=0
\end{cases}\space\begin{cases}a=1\\\b=0\end{cases}$

Тогда частное решение: $y_1=t^3e^{-t}$ 

Возвращаясь к $x$ имеем: $y_0=(C_1+C_2ln|x+1|)\frac{1}{x+1},\space{}y_1=\frac{1}{x+1}ln^3|x+1|$

И общее решение: $y=y_0+y_1=\frac{1}{x+1}(C_1+C_2ln|x+1|+ln^3|x+1|)$

### Метод вариации произвольной постоянной (метод Лагранжа)

1) Решить уравнение $y\'\'+2y\'+2y=\frac{1}{e^x\sin(x)}$

Найдем ФСР и общее решение соответствующего однородного уравнения: 
ФСР$\space=\lbrace{e^{-x}cos(x),\space{}e^{-x}sin(x)}\rbrace$
$y_0=e^{-x}(C_1cos(x)+C_2\sin(x))$.

Будем искать решения неоднородного уравнения в виде $y=e^{-x}(C_1(x)cos(x)+C_2(x)\sin(x))$

Для определения функций $C_1(x),C_2(x)$ решим систему:

$\begin{cases}
	C_1\'(x)e^{-x}cos(x)+C_2\'(x)e^{-x}sin(x)=0\\\
  C_1\'(x)e^{-x}(-cos(x)-sin(x))+C_2\'(x)e^{-x}(-sin(x)+cos(x))=\frac{1}{e^x\sin(x)}
\end{cases}\space\begin{cases}C_1\'(x)=-1\\\C_2\'(x)=\frac{cos(x)}{sin(x)}\end{cases}\space\begin{cases}C_1(x)=-x+C_1\\\C_2(x)=-\ln|\sin(x)|+C_2\end{cases},\space{}C_1,C_2-const$

Тогда общее решение неоднородного уравнения:

$y=e^{-x}((-x+C_1)cos(x)+(-\ln|\sin(x)|+C_2)\sin(x))$'
        ]);

        $questions = [
            [
                'q' => 'Указать вид частного решения уравнения $y\'\'-8y\'+20y=5xe^{4x}sin(2x)$',
                't' => 'test_one',
                'a' => [
                    '$xe^{4x}((ax+b)sin(2x)+(cx+d)cos(2x))$',
                    '$e^{4x}((ax+b)sin(2x)+(cx+d)cos(2x))$',
                    '$x(ax+b)e^{4x}(sin(2x)+cos(2x))$',
                    '$(ax+b)e^{4x}(sin(2x)+cos(2x))$',
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Указать вид частного решения уравнения $y\'\'-6y\'+8y=5xe^{2x}+2e^{4x}\sin{x}$',
                't' => 'test_one',
                'a' => [
                    '$(ax+b)e^{2x}+e^{4x}((cx+d)\sin{x}+(dx+e)\cos{x})$',
                    '$x(ax+b)e^{2x}+e^{4x}(c\sin{x}+d\cos{x})$',
                    '$(ax+b)e^{2x}+e^{4x}(c\sin{x}+d\cos{x})$',
                    '$x(ax+b)e^{4x}+e^{2x}(c\sin{x}+d\cos{x})$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Указать вид частного решения уравнения $y^{(4)}-4y\'\'\'+3y\'\'=x^2+xe^{2x}$',
                't' => 'test_one',
                'a' => [
                    '$x^2(ax+b)+ce^{2x}$',
                    '$ax^2+bx+c+(dx+e)xe^{2x}$',
                    '$x(ax^2+bx+c)+dxe^{2x}$',
                    '$x^2(ax^2+bx+c)+(dx+e)e^{2x}$',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Проинтегрировать уравнение $y\'\'-9y=e^{3x}\cos{x}$',
                't' => 'test_one',
                'a' => [
                    '$C_1e^{-3x}+C_2e^{-3x}+e^{-3x}(6\sin{x}+3\cos{x})$',
                    '$C_1e^{-3x}+C_2e^{3x}+e^{3x}(\frac{6}{37}\sin{x}-\frac{1}{37}\cos{x})$',
                    '$C_1e^{-3x}+C_2e^{3x}+e^{3x}(\frac{1}{37}\sin{x}-\frac{3}{37}\cos{x})$',
                    '$C_1e^{3x}+C_2e^{3x}+e^{-3x}(\frac{6}{17}\sin{x}+\frac{1}{17}\cos{x})$',
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Проинтегрировать уравнение $$',
                't' => 'test_one',
                'a' => [
                    '$e^x(xe^x+C_1x+C_2)$',
                    '$e^{-x}(xln|x|+C_1x+C_2)$',
                    '$e^{-x}(xln|x|+C_1x^2+C_2x)$',
                    '$e^x(xln|x|+C_1x+C_2)$',
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Проинтегрировать уравнение $y\'\'-5y\'=3x^2+\sin{(5x)}$',
                't' => 'test_one',
                'a' => [
                    '$C_1+C_2e^{5x}-0,2x^3-0,06x^2-0,036x+0,02(\cos{5x}+\sin{5x})$',
                    '$C_1+C_2e^{5x}-0,2x^3-0,12x^2-0,048x+0,02(\cos{5x}-\sin{5x})$',
                    '$C_1+C_2e^{5x}-0,5x^2-0,12x^2-0,048x+0,02(e^{5x}-e^{5x})$',
                    '$C_1+C_2e^{5x}-0,5x^4-0,12x^2-0,036x+0,03(\cos{5x}+\sin{5x})$',
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Дифференциальные уравнения, допускающие понижение порядка',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Опишем некоторые виды дифференциальных уравнений, допускающих понижение порядка.

1) Уравнение вида $y^{(n)}=f(x)$. Проинтегрировав n раз получим общее решение

$y=\underbrace{\int..\int}_{\text{n}}f(x)\underbrace{dx..dx}_{\text{n}}+C_1\frac{x^{n-1}}{(n-1)!}+C_2\frac{x^{n-2}}{(n-2)!}+..+C_{n-1}x+C_n$.

2) Уравнение, не содержащее искомой функции и ее производных до порядка $k-1$ включительно.

->$F(x,y^{(k)},y^{(k+1)},..,y^{(n)}(x))=0$<-

Сделаем замену $y^{(k)}(x)=p(x)$, тогда

->$F(x, p(x),p\'(x),..,p^{(n-k)}(x))=0$<-

Далее, по возможности, определяем $p=f(x,C_1,C_2,..,C_{n-k})$, потом $k-$кратным интегрированием находим $y$ из уравнения $y^{(k)}=p$.

3) Уравнение не содержит независимой переменной.

->$F(y,y\',..,y^{(n)})=0$<-

Сделаем замену $y\'=p(y)$ и выразим все производные уравнения через $p$.

->$\begin{aligned}
	&y\'=\frac{dy}{dx}=p\\\
  &y\'\'=\frac{dp}{dx}=\frac{dp}{dy}\frac{dy}{dx}=p\frac{dp}{dy}\\\
  &y\'\'\'=\frac{d}{dx}(p\frac{dp}{dy})=\frac{d}{dy}p\frac{dp}{dy}\frac{dy}{dx}=p^2\frac{d^2p}{dy^2}+p(\frac{dp}{dy})^2\\\
  &...
\end{aligned}$<-

Получим уравнение $(n-1)$-го порядка.
Будем продолжать процесс, пока это возможно.

4) Уравнение $F(x,y,y\',..,y^{(n)})=0$, однородное относительно аргументов $y,y\',..,y^{(n)}$, т.е.

->$F(x,ty,ty\',..,ty^{(n)})=t^kF(x,y,y\',..,y^{(n)})$<-

Сделаем замену $y=e^{\int{zdx}}$, где $z$ - новая неизвестная функция $z=z(x)$

5) Уравнение, записанное в дифференциалах 

->$F(x,y,dx,dy,d^2y,..,d^ny)=0$<-

В котором $F$ однородна относительно аргументов $x,y,dx.dy,d^2y,..,d^ny$.

Если считать $x,dx$ первого измерения, $y,dy,d^2(y),..$ измерения $m$. Тогда $\frac{dy}{dx}$ будет иметь измерение $m-1$, $\frac{d^2y}{dx^2}$ - измерение $m-2$ и так далее.

Для понижения порядка применяется подстановка $x=e^t,\space{}y=ue^{mt}$. Так получается дифференциальное уравнение между $u$ и $t$, не содержащее явно $t$, то есть допускающее понижение порядка.',
            'examples' => '1) Найти общее решение уравнения $y\'\'\'=e^{3x}$

Уравнение имеет вид $y^{(n)}=f(x)$, поэтому будем последовательно его интегрировать:

$y\'\'=\frac{1}{3}e^{3x}+C_1,\quad{y}\'=\frac{1}{9}e^{3x}+C_1x+C_2,\quad{y}=\frac{1}{27}e^{3x}+\frac{1}{2}C_1x^2+C_2x+C_3$.

2) Решить уравнение $y\'\'\'=\sqrt{1-(y\'\')^2}$.

Уравнение не содержит $y,y\'$, поэтому можем понизить его порядок на 2 единицы заменой $y\'\'=p$.

Тогда, уравнение примет вид: $p\'=\sqrt{1-p^2}$. Проинтегрируем его.

$\frac{dp}{dx}=\sqrt{1-p^2}\iff\frac{dp}{\sqrt{1-p^2}}=dx\iff{}arcsin(p)=x+C\iff{p=sin(x+C)}$.

Последовательно интегрируя найдем y.

$y\'\'=sin(x+C),\quad{y\'}=cos(x+C)+C_1\quad{y}=-sin(x+C)+C_1x+C_2$

3) Решить уравнение $yy\'\'=(y\')^2$

Уравнение не содержит независимой переменной $x$, тогда полагаем $y\'=p\implies{y\'\'}=p\frac{dp}{dy}$.

Получили уравнение с разделяющимися переменными $yp\frac{dp}{dy}=p^2$, проинтегрируем его.

$\frac{dp}{p}=\frac{dy}{y}\implies{p}=Cy\iff{y\'}=Cy\iff\frac{dy}{dx}=Cy\iff\frac{dy}{y}=Cdx\implies{y}=C_1e^{Cx}$

4) Решить уравнение $x^2yy\'\'=(y+xy\')^2$.

Данное уравнение однордно относительно $y,y\',y\'\'$. Его порядок понижается на единицу подстановкой $y=e^{\int{zdx}}, z=z(x)$.

Тогда $y\'=ze^{\int{zdx}},\quad{y}\'\'=e^{\int{zdx}}(z^2+z\')$, теперь подставляем в уравнение

$\begin{aligned}
&x^2e^{\int{zdx}}e^{\int{zdx}}(z^2+z\')=(e^{\int{zdx}}+xze^{\int{zdx}})^2\\\
&x^2(z^2+z\')=(1+xz)^2\\\
&x^2z\'=1+2xz{}\\\
&z\'-\frac{2}{x}z-\frac{1}{x^2}=0\\\
&z=e^{\int{\frac{2}{x}dx}}(C+\int{\frac{1}{x^2}e^{\int{-\frac{2}{x}dx}}})=x^2(C-\frac{1}{3}x^{-3})=Cx^2-\frac{1}{3x}\\\
&y=e^{\int{Cx^2-\frac{1}{3x}}}=C_1e^{\frac{1}{3}Cx^3+\frac{1}{3}ln(x)}=\sqrt[3]{x}e^{\frac{1}{3}Cx^3}
\end{aligned}$

5) Решить уравнение $x^3y\'\'=(y-xy\')^2$.

Уравнение является обобщенным обнородным, так как считая $x,y,y\',y\'\'$ величинами $1,m,m-1,m-2$ измерений соответственно и приравнивая измерения всех членов, получим $3+m-2=2m=1+2m-2$

Сделаем замену $x=e^t,y=ue^t$ и найдем $y\',y\'\'$.

$\frac{dy}{dx}=\frac{dy/dt}{dx/dt}=\frac{e^t(\frac{du}{dt}+u)}{e^t}=\frac{du}{dt}+u$
$\frac{d^2y}{dx^2}=\frac{(d/dt)(dy/dt)}{dy/dt}=\frac{d^2u/dt^2+du/dt}{e^t}$

Тогда уравнение, после приведения подобных и сокращений, примет вид:

$d^2u/dt^2+du/dt=(\frac{du}{dt})^2$

Положим $\frac{du}{dt}=p$, тогда  $\frac{d^2u}{dt^2}=p\frac{dp}{du}$, и тогда $p\frac{dp}{du}+p=p^2$

2 случая:

1) $p=0\implies{u}=C\iff{y}=Cx$
2) $\frac{dp}{du}+1=p\implies{p}=1+C_1e^u$ или $\frac{du}{dt}=1+C_1e^u\implies{u}=\ln(\frac{e^t}{C_1x+C_2})$.

Возвращаемся к $x,y$: $y=x\ln(\frac{x}{C_1x+C_2})$ - общее решение.

В ответ решение первого случая не включаем, так как оно входит в общее решение при $C_1=e^{-C},C_2=0$'
        ]);

        $questions = [
            [
                'q' => 'Укажите уравнения, которые можно решить путем n-кратного интегрирования, где n порядок уравнения',
                'a' => [
                    '$y\'\'siny=x$',
                    '$y\'\'sin(x)=x$',
                    '$x\ln{x}y\'\'=y\'\'\'$',
                    '$2y\'\'=\frac{y\'}{x}+\frac{x^2}{y\'}$',
                    '$y^{(9)}=e^x$',
                    '$y\'\'y=(y\')^2$',
                    '$(y\'\'\')^6=x^2$',
                    '$y^{(4)}+xy^{(3)}+x^2y^{(2)}+x^4y=0$',
                ],
                'c' => [false, true, false, false, true, false, true, false]
            ],
            [
                'q' => 'Укажите уравнения, порядок которых можно понизить на 3 единицы заменой $y\'\'\'(x)=z(x)$',
                'a' => [
                    '$yy\'\'\'=y^{(4)}$',
                    '$yy\'\'\'=y\'\'$',
                    '$xy\'\'\'=y^{(4)}$',
                    '$xsin(y)=y\'\'\'$',
                    '$x+x^2y^{(5)}+x^3y^{(3)}=0$'
                ],
                'c' => [false, false, true, false, true]
            ],
            [
                'q' => 'Укажите уравнения, однородные относительно $y,y\',...,y^{(n)}$, где n - порядок уравнения',
                'a' => [
                    '$x^2yy\'\'=(y-xy\')^2$',
                    '$x^2yy\'\'=(y-xsin(y\'))^2$',
                    '$sin(x^2)yy\'\'=(y-xy\')^2$',
                    '$e^xy\'\'\'y\'\'y=(e^xy+y\')^3$',
                    '$e^yy\'=xyy\'\'$',
                    '$x^2(y\')^2+yy\'\'\'x^3+\ln{x}y^{(4)}y\'\'=0$',
                ],
                'c' => [true, false, true, true, false, true]
            ],
            [
                'q' => 'Укажите обобщенные однородные уравнения',
                'a' => [
                    '$x^3y\'\'=(y^2-xy\')^2$',
                    '$y\'\'\'=x\sin{y}$',
                    '$sin(x^2)yy\'\'=(y-xy\')^2$',
                    '$2yy\'\'-(y\')^2=y^2y\'$',
                    '$y\'\'\'x=3\frac{y}{x^2}+y^2$',
                    '$x^3y\'\'=(y^2-xy\')^2$',
                ],
                'c' => [false, false, false, true, true, true]
            ],
            [
                'q' => 'Какая подстановка применяется для понижения порядка обобщенного однородного уравнения, если считаем что  $x$ и $dx$ - 1-го измерения $y,dy,d^2y...$ n-го измерения',
                't' => 'test_one',
                'a' => [
                    '$x=e^t,y\'=ue^{mt}$',
                    '$y\'=z$',
                    '$x=e^t,y=ue^{mt}$',
                    '$x=e^{mt},y=ue^t$'
                ],
                'c' => [false, false, true, false]
            ],
        ];
        $this->create_questions($lesson, $questions);

        //Coding theory
        $course = Course::Create([
            'name' => 'Дискретная математика',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'disc_math.jpg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Теория кодирования', 'Конечные автоматы', 'Теория графов'];
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
            //'video' => 'defs.mp4'
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
            'name' => 'Алфавитное кодирование',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '',
            'examples' => '1) С помощью алгоритма Фано построить код сообщения "AAABBABBBCCBCCDDEFAD"

Посчитаем вероятность встречи каждого символа в сообщении:

A - $\frac{5}{20}$, B - $\frac{6}{20}$, C - $\frac{4}{20}$, D - $\frac{3}{20}$, E - $\frac{2}{20}$

Запишем символы в таблицу, упорядочив их по убыванию вероятности встречи в сообщении,
далее делим символы на 2 группы

$\begin{array}{|c|c|c|c|c|}
   B & 6 & 0 & 0 &\\\
   A & 5 & 0 & 1 &\\\
   C & 4 & 1 & 0 & 0 \\\
   D & 3 & 1 & 0 & 1 \\\
   E & 1 & 1 & 1 & 0\\\
   F & 1 & 1 & 1 & 1
\end{array}$

2) С помощью алгоритма Хаффмена построить код сообщения "AAABBABBBCCBCCDDEFAD"

$\begin{array}{|c|c|c|c|c|c|c|}
   B & 6 & 6 & 6 & 9 & 11 & 10 \\\
   A & 5 & 5 & 5 & 6 & 9  & 11 \\\
   C & 4 & 4 & 5 & 5 &    & 01 \\\
   D & 3 & 3 & 4 &   &    & 000 \\\
   E & 1 & 2 &   &   &    & 001\\\
   F & 1 &   &   &   &    & 0001\\\
\end{array}$'
        ]);

        $questions = [
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
   a_{1,1} & a_{1,2} & ... & a_{1,k} \\\
   : & : & .. & :\\\
   a_{n-k,1} & a_{n-k,2} & ... & a_{n-k,k}
\end{pmatrix}$

Тогда из определения проверочной матрицы $Hx^t=0$, т.е.  $a_{i,1}x_1+a_{i,2}x_2+...+a_{i,k}x_k+x_{k+i}=0 , i=\overline{1,n-k}$, 
откуда $x_{k+i}=-(a_{i,1}x_1+a_{i,2}x_2+...+a_{i,k}x_k)$

Таким образом $\begin{pmatrix}
   x_{k+1} \\\
   : \\\
   x_{n}
\end{pmatrix}=-A_{n-k,k}\begin{pmatrix}
   x_1 \\\
   :\\\
   x_k
\end{pmatrix}=-A_{n-k,k}\begin{pmatrix}
   u_1 \\\
   :\\\
   u_k
\end{pmatrix}$

Получаем $x^t=\begin{pmatrix}
   E_k \\\
   :\\\
   -A_{n-k,k}
\end{pmatrix}u^t$

Тогда $x=u(E_k|-A_{n-k,k}^t)=uG$

**Теорема о столбцах проверочной матрицы.** Код длины n имеет кодовое расстояние d тогда и только тогда, когда любые d-1 столбцов его проверочной матрицы H линейно независимы и найдутся d линейно зависимых столбцов.

*Доказательство:* 

Необходимость: Пусть x вектор веса w. Ясто что $x\in{C}\iff{Hx^t=0}$, что эквивалентно линейной зависимости некоторых w столбцов матрицы H. Обозначим $i$-й столбец матрицы H через $h_i$, т.e. $H=[h_1..h_n]$ Отсюда и из равенства $Hx^t=0$ получаем $\displaystyle\sum_{i=1}^n{h_ix_i}=0$, откуда следует соотношение $h_{i_1}+..+h_{i_w}=0$. Т.к. $d=\min\limits_{x\in{C}, x\not={0}}(w(x))$, получаем линейную зависимость некоторой совокупности d столбцов матрицы H.  

Достаточность очевидна.
',
            'examples' => '1) (5, 2)-код задан порождающей матрицей $G=\begin{pmatrix}
   1 & 0 & 0 & 1 & 0 \\\
   1 & 1 & 1 & 0 & 1
\end{pmatrix}$. Найти его проверочную матрицу H, множество кодовых слов C, кодовое расстояние d.

Составим всевозможные линейные комбинации порождающих векторов $g_1=(10010)$ $g_2=(11101)$ - строк матрицы G и получим множество кодовых слов C. $\forall{x\in{C}}\space{x=\alpha_1g_1+\alpha_2g_2}, \alpha_{1,2}\in{\lbrace0,1\rbrace}$, $\lvert{C}\rvert=2^2$

$C={\lbrace(00000),(10010),(11101),(01111)\rbrace}$

Минимальное кодовое расстояние $d=\min\limits_{x\in{C}}(w(x))=2$

В коде $C$ 4 кодовых слова, поэтому можно закодировать 4 сообщения.

Закодируем сообщение u=$(01)$

$u*G=(01)*\begin{pmatrix}
   1 & 0 & 0 & 1 & 0 \\\
   1 & 1 & 1 & 0 & 1
\end{pmatrix}=(01101)$

Найдем проверочную (2,5)-матрицу H, используя условие $H*G^t=0$

$(x_1x_2x_3x_4x_5)*\begin{pmatrix}
   1 & 1 \\\
   0 & 1 \\\
   0 & 1 \\\
   1 & 0 \\\
   0 & 1
\end{pmatrix}=0$

Решим систему линейных уравнений, с $5-2=3$ свободными переменными.
$\begin{cases}
   x_1+x_4=0  \\\
   x_1+x_2+x_3+x_5=0
\end{cases}\begin{cases}
   x_4=x_2+x_3+x_5  \\\
   x_1=x_2+x_3+x_5
\end{cases}$

$(x_2+x_3+x_5,x_2,x_3,x_2+x_3+x_5,x_5)=x_2(11010)+x_3(10110)+x_5(10011)$

$H=\begin{pmatrix}
   1 & 1 & 0 & 1 & 0 \\\
   1 & 0 & 1 & 1 & 0 \\\
   1 & 0 & 0 & 1 & 1
\end{pmatrix}$

2) Линейный (8,5)-код задан проверочной матрицей $H=\begin{pmatrix}
   1 & 1 & 1 & 1 & 0 & 0 & 1 & 1 \\\
   0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
   0 & 0 & 0 & 1 & 1 & 1 & 1 & 0
\end{pmatrix}$, найти порождающую матрицу $G$ и минимальное кодовое расстояние $d$

Будем искать $G$ из условия $HG^t=0$

$H=\begin{pmatrix}
   1 & 1 & 1 & 1 & 0 & 0 & 1 & 1 \\\
   0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
   0 & 0 & 0 & 1 & 1 & 1 & 1 & 0
\end{pmatrix}\begin{pmatrix}
   x_1 \\\
   x_2 \\\
   x_3 \\\
   x_4 \\\
   x_5 \\\
   x_6 \\\
   x_7 \\\
   x_8
\end{pmatrix}=0$

Решим СЛАУ c 8-5=3 свободными переменными:

$\begin{cases}
	x_1 + x_2 + x_3 + x_4 + x_7 + x_8 = 0 \\\
  x_2 + x_5 + x_6 + x_7 = 0 \\\
  x_4 + x_5 + x_6 + x_7 = 0
\end{cases}$

$(x_1,x_4+x_7+x_8,x_1,x_4,x_5,x_4+x_5+x_7,x_7,x_8)=x_1(10100000)+x_4(01010100)+x_5(00001100)+x_7(01000110)+x_8(01000001)$

$G=\begin{pmatrix}
   1 & 0 & 1 & 0 & 0 & 0 & 0 & 0 \\\
   0 & 1 & 0 & 1 & 0 & 1 & 0 & 0 \\\
   0 & 0 & 0 & 0 & 1 & 1 & 0 & 0 \\\
   0 & 1 & 0 & 0 & 0 & 1 & 1 & 0 \\\
   0 & 1 & 0 & 0 & 0 & 0 & 0 & 1
\end{pmatrix}$

Видно, что $d=2$

'
            //'video' => ''
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
   0 & 1 & 0 & 1 & 1 & 1 & 0 \\\
   0 & 1 & 1 & 1 & 0 & 0 & 1 \\\
   1 & 1 & 1 & 0 & 1 & 0 & 0
\end{pmatrix}$

Удобно записывать проверочную матрицу кода Хэмминга, располагая ее столбцы в натуральном порядке, т.е. i-й столбец равен двоичному представлению числа i.

Рассмотрим пример (7, 4)-кода Хэмминга, со столбцами расположенными в натуральном порядке.

$\begin{pmatrix}
   0 & 0 & 0 & 1 & 1 & 1 & 1 \\\
   0 & 1 & 1 & 0 & 0 & 1 & 1 \\\
   1 & 0 & 1 & 0 & 1 & 0 & 1
\end{pmatrix}$

Очевидно, что любые два столбца матрицы H линейно независимы и найдутся три линейно зависимых столбца, следовательно по теореме о столбцах проверочной матрицы кодовое расстояние равно 3 и значит код исправляет одну ошибку

Пусть столбцы проверочной матрицы H кода Хэмминга расположены в натуральном порядке. Тогда справедлива
**Теорема.** Если произошла ошибка в i-м символе, то синдром S равен двоичному предствлению числа i.
### Расширенный код Хэмминга.

Расширенный код Хэмминга получается из (n,k)-кода Хэмминга добавлением бита проверки на четность. Кодовое расстояние при этом увеличивается на 1. Таким образом расширенный код Хэмминга является (n+1,k)-кодом с минимальным расстоянием 4, исправляющим 1 и обнаруживающим 2 ошибки.

Проверочная матрица $H\'$ расширенного кода Хэмминга может быть получена из проверочной матрицы $H$ кода Хэмминга добавлением в конец столбца из нулей, а затем приписыванием в качестве первой строки строки из единиц.

$H\'=\begin{pmatrix}
	1 & 1 & 1 & .. & 1 \\\
  &&&& 0 \\\
  &&H&& 0 \\\
  &&&& : \\\
  &&&& 0
\end{pmatrix}$

Опишем схему декодирования расширенного $(8,3)$-кода Хэмминга $C\'$ длины 8.

$H\'=\begin{pmatrix}
	 1 & 1 & 1 & 1 & 1 & 1 & 1 & 1\\\
   0 & 0 & 0 & 1 & 1 & 1 & 1 & 0\\\
   0 & 1 & 1 & 0 & 0 & 1 & 1 & 0\\\
   1 & 0 & 1 & 0 & 1 & 0 & 1 & 0
\end{pmatrix}$

Пусть принят вектор $y\'=(y_1..y_8)$.
Параллельно рассмотрим код Хэмминга $C$ для принятого вектора $y=(y_1..y_7)$

Тогда $S_y=\begin{pmatrix}
  y_4+y_5+y_6+y_7 \\\
  y_2+y_3+y_6+y_7 \\\
  y_1+y_3+y_5+y_7
\end{pmatrix},\space{}S_{y\'}=\begin{pmatrix}
	y_1+..+y_8 \\\
  y_4+y_5+y_6+y_7 \\\
  y_2+y_3+y_6+y_7 \\\
  y_1+y_3+y_5+y_7
\end{pmatrix}=S_y=\begin{pmatrix}
	y_1+..+y_8 \\\
  S_y
\end{pmatrix}$

Пусть произошла ошибка в одной из первых семи позиций, например в 3-ей позиции, тогда $S_y=(011)$ 

Тогда $S_{y\'}=\begin{pmatrix}y_1+..+y_8\\\S_y\end{pmatrix}=\begin{pmatrix}1\\\S_y\end{pmatrix}$

Таким образом при виде синдрома $S_{y\'}=\begin{pmatrix}1\\\S_y\end{pmatrix}$ полученого вектора в расширенном коде Хэмминга имеем позицию ошибки равную двоичному представлению $S_y$

Если получаем $S_{y\'}=\begin{pmatrix}0\\\S_y\end{pmatrix}$, то в общем случае можно сказать что расширенный код Хэмминга может обнаружить 2 и более ошибок.',
            'examples' => '1) Определить положение ошибки в коде Хэмминга длины 7, если принят вектор $x=(1111000)$.

Т.к. $7=2^3-1$, то m=3 и имеем (7,3,3)-код Хэмминга.

Составим его поверочную матрицу ( ее столбцами являются все различные ненулевые векторы длины 3 ), расположив ее столбцы в натуральном порядке.

$H=\begin{pmatrix}
	0 & 0 & 0 & 1 & 1 & 1 & 1 \\\
  0 & 1 & 1 & 0 & 0 & 1 & 1 \\\
  1 & 0 & 1 & 0 & 1 & 0 & 1
\end{pmatrix}$

$x=(1111000),\space{S_x=}Hx^t=(100)^t$.

Значит ошибка произошла в 4 позиции и декодированное слово $\tilde{x}=(1110000)$ (Здесь мы просто находим представление $S_x$ в десятичной системе счисления, т.е. $100_2=4_{10}$, это справедливо за счет того что записывали столбцы матрицы $H$ в натуральном порядке)


2) Исправить или обнаружить ошибки в словах $x=(11010011)$ и $y=(11001111)$ расширенного кода Хэмминга длины 8.

Построим проверочную матрицу расширенного (8,3)-кода Хэмминга.

$H\'=\begin{pmatrix}
	 1 & 1 & 1 & 1 & 1 & 1 & 1 & 1\\\
   0 & 0 & 0 & 1 & 1 & 1 & 1 & 0\\\
   0 & 1 & 1 & 0 & 0 & 1 & 1 & 0\\\
   1 & 0 & 1 & 0 & 1 & 0 & 1 & 0
\end{pmatrix}$

Далее найдем синдромы принятых векторов.

$S_x=H\'x=(1000)^t$, значит в x нет ошибок и $x\in{C}$

$S_y=H\'y=(0111)^t$, обнаруживаем в векторе $y$ имеется 2 или более ошибок.'
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
                'q' => 'Минимальное расстояние кода Хэмминга равно',
                'a' => [
                    '4',
                    '3',
                    '2',
                    '1'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Сколько столбцов в проверочной матрице расширенного кода Хемминга, полученного из $(7,4)$-кода Хэмминга',
                'a' => [
                    '7',
                    '8',
                    '6',
                    '9'
                ],
                'c' => [false, true, false, false]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Декодирование линейных кодов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть сообщение $u=(u_1..u_k)$ закодировано кодовым словом $x=(x_1..x_n)$, которое передается по каналу связи с шумом. Принятый вектор $y=(y_1..y_n)$ может отличаться от $x$.

Рассмотрим вектор ошибок e.

$e=y-x=(e_1..e_n), e_i=\begin{cases}
	0 \text{, с вероятностью}\space{1-p} \\\
  1 \text{, с вероятностью}\space{p}
\end{cases}$, $0<p<\frac{1}{2}$

Поскольку ошибки происходят независимо с вероятнстью $p$, то для e имеем:

->$p\lbrace{e=(000..0)}\rbrace=(1-p)^n$<-
->$p\lbrace{e=(010..0)}\rbrace=p(1-p)^{n-1}$<-
->...<-
->$p\lbrace{e=v, w(v)=k}\rbrace=p^k(1-p)^{n-k}$<-

Т.к. $p<\frac{1}{2}$, то $1-p>p$, и справедливо $(1-p)^n>p(1-p)^{n-1}>..>p^k(1-p)^{n-k}$

Декодирование проводим по максимуму правдоподобия, т.е. y декодируется в близжайшее x, так e выбираем наименьшего веса

Рассмотрим линейный $(n,k)$-код $C$

Для любого вектора a множество $a+C=\lbrace{a+x|x\in{C}}\rbrace$ называется **смежным классом.**

**Утверждение 1.** Каждый смежный класс содержит $2^k$ векторов.

*Доказательство*: $|a+C|=|\lbrace{a+x|x\in{C}}\rbrace|=|C|=2^k$

**Утверждение 2.** Два вектора $a, b$ принадлежат одному и тому же смежному классу тогда и только тогда, когда $a-b\in{C}$.

*Доказательство:* 
1) Пусть $a\in{d+C}$ и $b\in{d+C}$, тогда $a=d+x_1, x_1\in{C}$ и $b=d+x_2, x_2\in{C}$, но тогда $a-b=d+x_1-d-x_2=x_1-x_2\in{C}$

2) Пусть $a-b\in{C}$, тогда $a-b=x, x\in{C}$, так получим  $a+C=b+x+C=b+C$

**Теорема.** Любые два смежных класса либо не пересекаются, либо совпадают.

*Доказательство:* Рассмотрим смежные классы $a+C$ и $b+C$. Пусть $x\in{a+C}$ и $x\in{b+C}$, тогда $x=a+x_1=b+x_2,\space{x_1, x_2}\in{C}$, но тогда $a-b=x_2-x_1\in{C}$, значит по утверждению 2 $a$ и $b$, принадлежат одному и тому же смежному классу, то есть $a+C=b+C$.

$E^n=C\lor(a^1+C)\lor..\lor{(a^m+C)}$, где $m=2^{n-k}-1$

Таким образом постранство $E^n$ можно разобрать на классы эквивалентности по линейному коду $C$.

Принятый вектор $y$ попадает в некоторый класс эквивалентности с индексом $i$, т.е. $y=a^i+C$, что означает $y=a^i+x, x\in{C}$. Если было передано слово $x\'$, то вектор ошибок $e=y-x\'=a^i+x-x\'=a^i+x\'\'\in{a^i+C}$, то есть $e$ принадлежит тому же классу смежности, что и $y$. Так все возможнные вектора ошибок принадлежат тому же классу смежности, что и $y$.

Из смежного класса, содержащего $y$ выбирается вектор $e$ наименьшего веса. Затем декодируем $y$ как $x=y-e$

Вектор минимального веса из смежного класса, называется **лидером** этого смежного класса.

Процесс декодирования можно упростить с помощью **синдромов**. Для декодирования:
1) Выписываем лидеры смежных классов и сответствующие им синдромы.
2) Получив вектор $y$, вычисляем его синдром.
3) Ищем лидер $a^i$ смежного класса с с тем же синдромом, что и у вектора $y$.
4) $x=y-a^i$ - предположительно посланный вектор $x$.

### Свойства синдрома

Пусть $S_y$ - синдром вектора $y\in{E^n}$, C - линейный $(n,k)$-код

**Утверждение 3.** Если проверочная матрица имеет $n-k$ строк, то $S_y$ является вектором длины  $n-k$

**Утверждение 4.** $S_y=0\Leftrightarrow{y\in{C}}$.

**Утверждение 5.** $S_y=\sum{h_j},\space{h_j}\in{H}$, где $j$ пробегает все индексы столбцов проверочной матрицы $H$, в которых произошли ошибки. 

*Доказательство:* Пусть получен вектор $y=x+e,\space{x}\in{C}$, тогда используя утверждение 4 имеем $S_y=Hy^t=H(x+e)^t=Hx^t+He^t=He^t$

Пусть $e_{j_1}=..=e_{j_s}=1$, значит произошли ошибки в $j_1..j_s$ координатах, и тогда имеем:
$He^t=\displaystyle\sum_{k=1}^s{e_{j_k}h_{j_k}}=h_{j_1}+..+h_{j_s},\space{h_{j_k}}$ - $k$-й столбец $H$

Таким образом $S_y=\displaystyle\sum_{k=1}^s{h_{j_k}}$, то есть синдром вектора выделяет те позиции где произошли ошибки.',
            'examples' => '1) Построить таблицу синдромов и соответствующих лидеров для $(8,3)$-кода, с порждающей матрицей $G=\begin{pmatrix}
	1 & 0 & 1 & 1 & 0 & 1 & 1 & 1 \\\
  0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
  1 & 0 & 0 & 1 & 1 & 0 & 1 & 1
\end{pmatrix}$. Исправить ошибки в словах $x=(11110110)$ $y=(10010111)$ $z=(01111100)$.

Решение:

Приведем матрицу $G$ к каноническому виду $[E_3|A]$, тогда $H=[A^t|E_5]$.

$G=\begin{pmatrix}
	1 & 0 & 1 & 1 & 0 & 1 & 1 & 1 \\\
  0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
  1 & 0 & 0 & 1 & 1 & 0 & 1 & 1
\end{pmatrix}\backsim\begin{pmatrix}
	1 & 0 & 1 & 1 & 0 & 1 & 1 & 1 \\\
  0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
  0 & 0 & 1 & 0 & 1 & 1 & 0 & 0
\end{pmatrix}\backsim\begin{pmatrix}
	1 & 0 & 0 & 1 & 1 & 0 & 1 & 1 \\\
  0 & 1 & 0 & 0 & 1 & 1 & 0 & 1 \\\
  0 & 0 & 1 & 0 & 1 & 1 & 0 & 0
\end{pmatrix}=G\'$

$H=\begin{pmatrix}
	1 & 0 & 0 & 1 & 0 & 0 & 0 & 0 \\\
  1 & 1 & 1 & 0 & 1 & 0 & 0 & 0 \\\
  0 & 1 & 1 & 0 & 0 & 1 & 0 & 0 \\\
  1 & 0 & 0 & 0 & 0 & 0 & 1 & 0 \\\
  1 & 1 & 0 & 0 & 0 & 0 & 0 & 1
\end{pmatrix}$

Составим таблицу всевозможных сообщений и кодовых слов для исходного кода C с порождающей матрицей G и кода C\', с порождающей матрицей канонического вида G\'

$\begin{array}{|c|c|c|c|c|c|c|c|c|}
   F^3_2 & 000 & 001 & 010 & 011 & 100 & 101 & 110 & 111\\\
   C & 00000000 & 10011011 & 01001101 & 11010110 & 10110111 & 00101100 & 11111010 & 01100001 \\\
   C\' & 00000000 & 00101100 & 01001101 & 01100001 & 10011011 & 10110111 & 11010110 & 11111010
\end{array}$

Свойство проверочной матрицы $GH^t=0$ говорит о том, что проверочная матрица, будучи порождающей для дуального кода, имеет строки, ортогональные всем кодовым словам, поэтому приведение $G$ к систематическому виду $G\'$ этого свойства не нарушает.

Колличество синдромв для кода C равно $\frac{2^n}{|C|}=\frac{2^n}{2^k}=2^{n-k}=2^m=2^5=32$

Запишем таблицу синдромов $S_{e_i}$ и соответствующих им лидеров $e_i$ (Для сокращения записи будем записывать синдромы в транспонированном виде)

$\begin{array}{c|c|c|c|c|c|c|c|c|c|c|c|}
   i & e_i & S^t_{e_i} & i & e_i & S^t_{e_i} & i & e_i & S^t_{e_i} & i & e_i & S^t_{e_i}\\\
   1 & 00000000 & 00000 &  9 & 00001000 & 01000 & 17 & 00010000 & 10000 & 25 & 00011000 & 11000 \\\
   2 & 00000001 & 00001 & 10 & 00001001 & 01001 & 18 & 00010001 & 10001 & 26 & 10000010 & 11001 \\\
   3 & 00000010 & 00010 & 11 & 00001010 & 01010 & 19 & 00010010 & 10010 & 27 & 10000001 & 11010 \\\
   4 & 00000011 & 00011 & 12 & 10100000 & 01011 & 20 & 10001000 & 10011 & 28 & 10000000 & 11011 \\\
   5 & 00000100 & 00100 & 13 & 00001100 & 01100 & 21 & 00010100 & 10100 & 29 & 00110000 & 11100 \\\
   6 & 00000101 & 00101 & 14 & 01000000 & 01101 & 22 & 01001000 & 10101 & 30 & 01010000 & 11101 \\\
   7 & 00000110 & 00110 & 15 & 00100010 & 01110 & 23 & 11000000 & 10110 & 31 & 10101000& 11110 \\\
   8 & 00000111 & 00111 & 16 & 01000010 & 01111 & 24 & 10100000 & 10111 & 32 & 10000100 & 11111 \\\
\end{array}$

Теперь найдем синдромы полученных слов. Затем для исправления ошибок ищем в таблице синдромов и лидеров соответствующего лидера и принимаем его за вектор ошибок. Получим $\tilde{x}$ - декодированное слово и $u_x$ - соответствующее сообщение из таблицы кодовых слов и сообщений (но нужно искать сообщения, соответствующие исходному коду C)

a) $x=(11110110),\space{S_x}=Hx^t=(01100)^t,\space{e_x}=(00001100),\space\tilde{x}=x-e_x=(11111010),\space{u_x=(110)}$ 

b) $y=(10010111),\space{S_y}=(01100)^t,\space{e_y}=(00001100),\space\tilde{y}=y-e_y=(10011011),\space{u_y=(001)}$

c) $z=(011111100),\space{S_z}=(11101)^t,\space{e_z}=(01010000),\space\tilde{z}=z-e_z=(00101100),\space{u_z=(101)}$
'
        ]);

        $questions = [
            [
                'q' => 'Сколько единиц будет в вектое ошибок, если при передаче произошла 1 ошибка',
                'a' => [
                    'Все зависит от переданного кодового слова.',
                    '0',
                    '1',
                    'Число, равное минимальному весу принятого вектора.',
                    'Число, равное минимальному весу переданного вектора.',
                ],
                'c' => [false, false, true, false, false]
            ],
            [
                'q' => 'По каналу связи передано кодовое слово $x$. Если синдром принятого вектора $y$ равен нулевому вектору, то',
                'a' => [
                    '$y$ - нулевой вектор',
                    'вектор ошибок $e=y-x$ - нулевой вектор',
                    'все координаты вектора ошибок $e=y-x$ единицы',
                    'При передаче не поизошло ошибок',
                    'При передаче произошли ошибки',
                    '$y$ и $e=x-y$ не лежат в одном классе смежности'
                ],
                'c' => [false, true, false, true, false, false]
            ],
            [
                'q' => 'Для реализации принципа максимума правдоподобия при декодировании',
                'a' => [
                    'В качестве принятого выбирается вектор с минимальным весом',
                    'В качестве принятого выбирается вектор с максимальным весом',
                    'Выбирается вектор ошибок с минимальным весом',
                    'Выбирается вектор ошибок с максимальным весом'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Если синдромы двух принятых векторов $u$ и $v$ равны, то можно утверждать что',
                'a' => [
                    'Ошибки произошли в одинаковых позициях',
                    'Эти векора неотличимы',
                    'Вектора ошибок этих векторов равны',
                    '$u$ и $v$ декодируются в одно и то же кодовое слово',
                    'Исходное слово для $u$ и $v$ было одним и тем же',
                    '$u$ и $v$ попадают в один и тот же смежный класс'
                ],
                'c' => [true, false, true, false, false, true]
            ],
            [
                'q' => 'Найдите длину $S_y$, если в проверочной матрице $n-k$ строк',
                'a' => [
                    '$n$',
                    '$k$',
                    '$n-k$',
                    '$n^k$'
                ],
                'c' => [false, false, true, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Коды Рида-Маллера',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Двоичный код Рида-Маллера $RM(r,m)$ порядка $r$ и длины $2^m$ определяется как множество всех векторов $f$, задаваемых булевыми функциями $f(x_1,..,x_m)$,  представимыми всеми полиномами Жегалкина, степень которых не превосходит r.

В качестве примера рассмотрим $RM(1,8)$. Число переменных $m=\log_28=3$. Так RM(1,8) состоит из всех векторов, задаваемых булевыми функциями от 3-ёх переменных.

Запишем общий вид полинома Жегалкина от трех переменных:

$a_{000}+a_{001}x_1+a_{010}x_2+a_{011}x_1x_2+a_{100}x_3+a_{101}x_1x_3+a_{110}x_2x_3+a_{111}x_1x_2x_3$

Опишем все векторы кода $RM(1,8)$ и соответствующие полиномы Жегалкина:

->$\begin{array}{c|c}
   \text{полином} & \text{кодовое слово} \\\
   0   & 00000000 \\\
   x_3 & 00001111 \\\
   x_2 & 00110011 \\\
   x_1 & 01010101 \\\
   x_3+x_2 & 00111100 \\\
   x_3+x_1 & 01011010 \\\
   x_2+x_1 & 01100110 \\\
   x_3+x_2+x_1 & 01101001 \\\
   1 & 11111111 \\\
   1+x_3 & 11110000 \\\
   1+x_2 & 11001100 \\\
   1+x_1 & 10101010 \\\
   1+x_3+x_2 & 11000011 \\\
   1+x_3+x_1 & 10100101 \\\
   1+x_2+x_1 & 10011001 \\\
   1+x_3+x_2+x_1 & 10010110 \\\
\end{array}$<-

**Теорема.** Наибольшее число ненулевых членов в полиноме Жегалкина от $m$ переменных степени $r$ равно $1+\binom{m}{1}+..+\binom{m}{r}$

*Доказательство:* Слагаемых, не содержащих переменных одно - это единица. Слагаемых, содержащих 1 переменную $\binom{m}{1}$. Слагаемых, содержащих $t$ переменных $\binom{m}{t}$. Таким образом, по правилу суммы, получаем нужное.

Значит размерность кода $RM(r,m)$ равна $1+\binom{m}{1}+..+\binom{m}{r}$ и код содержит $2^{1+\binom{m}{1}+..+\binom{m}{r}}$ кодовых слов.
'
        ]);

        $questions = [
            [
                'q' => 'Найдите минимальное расстояние кода $RM(3,8)$',
                'a' => [
                    '16',
                    '32',
                    '64',
                    '8'
                ],
                'c' => [false, true, true, false]
            ],
            [
                'q' => 'Какое наибольшее колличество ненулевых переменных может содержать полином Жегалкина от 8 переменных степени 3?',
                'a' => [
                    '32',
                    '64',
                    '103',
                    '93'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Найдите длину $RM(3,8)$',
                'a' => [
                    '8',
                    '128',
                    '516',
                    '256'
                ],
                'c' => [false, false, true, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Мажоритарное декодирование',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Множество проверочных уравнений называется **ортогональным** относительно $i$-й координаты, если переменная $x_i$ входит во все уравнения, а другие переменные входят не более чем в одно уравнение.

**Теорема.** Если для любого символа линейного кода существует не менее $d-1$ проверочных сумм, ортогональных относительно этого символа, то код имеет минимальное кодовое расстояние не меньшее, чем d.

Рассмотрим пример для линейного (7,3)-кода.

$H=\begin{pmatrix}
	1 & 1 & 0 & 1 & 0 & 0 & 0 \\\
  0 & 1 & 1 & 0 & 1 & 0 & 0 \\\
  0 & 0 & 1 & 1 & 0 & 1 & 0 \\\
  0 & 0 & 0 & 1 & 0 & 0 & 1
\end{pmatrix}$

Пусть принято кодовое слово $x=(x_1..x_7)$, тогда первой строке матрицы $H$ соответствует проверочное соотношение $x_1+x_2+x_4=0$, сумме $1, 2, 4$ строк $x_1+x_3+x_7=0$, сумме $1,2,3$ строк $x_1+x_5+x_6=0$.

Эти соотношения ортогональны относительно $x_1$

Теперь будем следовать следующему правилу: Если среди значений $x_1..x_7$ большинство составляют нули, то полагаем что $x_1=0$, иначе $x_1=1$. Это гарантирует верное решение, в случае если принятое слово содержит не более одной ошибки. Если колличество нулей равно колличеству единиц, это возможно в случае двойной ошибки, тогда сможем только обнаружить ошибки.

Если на первом шаге удается восстановить символы принятого слова, то код, для которого это возможно, называется **полностью ортогональным**

Если же на первом шаге восстанавливаются лишь некоторые комбинации из $t$ элементов принятого слова, далее комбинации из менее чем $t$ элементов и так далее до тех пор пока не будет получено множество проверочных сумм, ортогональных относительно некоторого ошибочного символа.',
            'examples' => '1) Проведем мажоритарное декодирование линейного $(8, 4)$-кода с порождающей матрицей G.

->$G=\begin{pmatrix}
	1 & 1 & 1 & 1 & 1 & 1 & 1 & 1 \\\
  0 & 0 & 0 & 0 & 1 & 1 & 1 & 1 \\\
 	0 & 0 & 1 & 1 & 0 & 0 & 1 & 1 \\\
  0 & 1 & 0 & 1 & 0 & 1 & 0 & 1
\end{pmatrix}=\begin{pmatrix}g_0\\\g_1\\\g_2\\\g_3\end{pmatrix}$<-

Пусть $x=(a_0..a_7)$ - произвольное кодовое слово. Его можно представить в виде линейной комбинации строк матрицы $G$: $x=x_0g_0+x_1g_1+x_2g_2+x_3g_3$ или 

$x=x_0\begin{pmatrix}1\\\1\\\1\\\1\\\1\\\1\\\1\\\1\end{pmatrix}+x_1\begin{pmatrix}0\\\0\\\0\\\0\\\1\\\1\\\1\\\1\end{pmatrix}+x_2\begin{pmatrix}0\\\0\\\1\\\1\\\0\\\0\\\1\\\1\end{pmatrix}+x_3\begin{pmatrix}0\\\1\\\0\\\1\\\0\\\1\\\0\\\1\end{pmatrix}=\begin{pmatrix}
	x_0 \\\
  x_0+x_3 \\\
  x_0+x_2 \\\
  x_0+x_2+x_3 \\\
  x_0+x_1 \\\
  x_0+x_1+x_3 \\\
  x_0+x_1+x_2 \\\
  x_0+x_1+x_2+x_3
\end{pmatrix}$

Найдем проверки для $x_3$
Видим что $a_0+a_1=x_3$ (Cумма первой и второй координаты вектора $x$).
Аналогично: $a_2+a_3=x_3,\space{}a_4+a_5=x_3\space{}a_6+a_7=x_3$

Проверки для $x_2$: $a_0+a_2=x_2,\space{}a_1+a_3=x_2,\space{}a_4+a_6=x_2,\space{}a_5+a_7=x_2$

Проверки для $x_1$: $a_0+a_4=x_1,\space{}a_1+a_5=x_1,\space{}a_2+a_6=x_1,\space{}a_3+a_7=x_1$

Далее, применяя к полученным проверкам принцип большинства, найдем значения коэффициентов $x_1,x_2,x_3$

Если определить $x_1,x_2,x_3$, то ожно найти и $x_0$. Рассмотрим равенство $x\'=x-x_1g_1-x_2g_2-x_3g_3$. При безошибочной передаче $x\'=x_0g_0$, то есть у $x\'$ все координаты должны быть одинаковыми. Значит все они равны либо 1 либо. По большинству принимаем значение $x_0$.

Пусть принято слово $(01110110)$, тогда

->$\begin{matrix}
   x_1=0 & x_2=1 & x_3=1\\\
   x_1=0 & x_2=0 & x_3=0\\\
   x_1=0 & x_2=1 & x_3=1 \\\
   x_1=1 & x_2=1 & x_3=1
\end{matrix}$<-

По большинству значений находим $x_1=0,\space{}x_2=1,\space{}x_3=1$, тогда $x\'=(00010000)$ следовательно $x_0=0$, $x=g_2+g_3=(01100110)$
Рассмотрим мажоритарное декодирование кода Рида-Маллера второго порядка $RM(2,4)$

Составим порождающую матрицу:

$G=\begin{pmatrix}
1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1 \\\
0&0&0&0&0&0&0&0&1&1&1&1&1&1&1&1 \\\
0&0&0&0&1&1&1&1&0&0&0&0&1&1&1&1 \\\
0&0&1&1&0&0&1&1&0&0&1&1&0&0&1&1 \\\
0&1&0&1&0&1&0&1&0&1&0&1&0&1&0&1 \\\
0&0&0&0&0&0&0&0&0&0&0&0&1&1&1&1 \\\
0&0&0&0&0&0&0&0&0&0&1&1&0&0&1&1 \\\
0&0&0&0&0&0&0&0&0&1&0&1&0&1&0&1 \\\
0&0&0&0&0&0&1&1&0&0&0&0&0&0&1&1 \\\
0&0&0&0&0&1&0&1&0&0&0&0&0&1&0&1 \\\
0&0&0&1&0&0&0&1&0&0&0&1&0&0&0&1 \\\
\end{pmatrix}=\begin{pmatrix}g_0\\\g_1\\\g_2\\\g_3\\\g_4\\\g_1g_2\\\g_1g_3\\\g_1g_4\\\g_2g_3\\\g_2g_4\\\g_3g_4\end{pmatrix}$

Если $x$ - кодовое слово, то $x=a_0g_0+a_1g_1+a_2g_2+a_3g_3+a_4g_4+a_{12}g_1g_2+a_{13}g_1g_3+a_{14}g_1g_4+a_{23}g_2g_3+a_{24}g_2g_4+a_{34}g_3g_4$

Сначала определим правильные значения для коэффициентов $a_{ij}$, для кажого из которых имеется по 4 проверочных соотношения. Например для $a_{34}$ имеем:

->$\begin{matrix}a_{34}=x_0+x_1+x_2+x_3\\\a_{34}=x_4+x_5+x_6+x_7\\\a_{34}=x_8+x_9+x_{10}+x_{11}\\\a_{34}=x_{12}+x_{13}+x_{14}+x_{15}\end{matrix}$<-

После определения этих коэффициентов находим вектор $x\'=x-a_{12}g_1g_2-..-a_{34}g_3g_4$. Поскольку при безошибочной передаче $x\'=a_0g_0+a_1g_1+a_2g_2+a_3g_3+a_4g_4$, то проверочные соотношения для коэффициентов $a_1,a_2,a_3,a_4$ получаем из элементов вектора $x\'$ с помощью матрицы $G$. Например $a_4=x_0\'+x_1\'$ одно из проверочных соотношений для $a_4$, где $x_i\'$ - элементы вектора $x\'$.

И на третьем шаге определяем коэффициент $a_0$
'
        ]);

        $questions = [
            [
                'q' => 'Как называется множество проверочных уравнений относилельно $i$-й координаты, если переменная $x_i$ входит во все уравнения, а другие переменные входят не более чем в одно уравнение?',
                'a' => [
                    'Изометрическое',
                    'Ортогональное',
                    'Параллельное',
                    'Симметрическое'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Какое самое малое кодовое расстояние может быть у кода, в котором для любого символа существует не менее $d-1$ проверочная сумма?',
                'a' => [
                    '$d-1$',
                    '$d+1$',
                    '$d$',
                    '$2*d$'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Ортогональны ли суммы $a_0+a_1+a_2, a_0+a_2+a_3, a_0+a_3+a_4$',
                'a' => [
                    'Да',
                    'Нет',
                    'Невозможно определить'
                ],
                'c' => [false, true, true]
            ],
            [
                'q' => 'Ортогональны ли суммы $a_0+a_1+a_2, a_0+a_3+a_4, a_0+a_a_5+a_6$',
                'a' => [
                    'Да',
                    'Нет',
                    'Невозможно определить'
                ],
                'c' => [true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Введение',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => ' **Автомат** - преобразователь информации, реакция которого зависит не только от  входа в данный момент, но и от того, что было на входе раньше, от входной истории.
 
 Если автомат будет вести себя по-разному для каждой возможной предистории, то такой бесконечный автомат должен иметь бесконечную память , чтобы запоминать все эти предистории. 
 
Введем на множестве предисторий отношение эквивалентности. Будем считать две предстории эквивалентными, если они одинаковым образом влияют на дальнейшее поведение автомата. Для своего функционирования автомату не обязательно запоминать входные истории, ему достаточно запоминать лишь класс эквивалентности, к которому принадлежит данная история.

Автомат, для которого колличество классов эквивалентных входных историй конечно называется **конечным автоматом** (КА).

**Внутренним состоянием** автомата назовем класс эквивалентности его входных историй.

Состояние системы есть ее характеристика, однозначно определяющая ее дальнейшее поведение, все последующие реакции системы на внешние события. На один и тот же входной сигнал КА может реагировать по разному, в зависимости от того, в каком состоянии он на данный момент.  При входе очередного сигнала автомат выдает информацию на выход как функцию от этого входного сигнала и текущего состояния, а также он меняет свое состояние, поскольку входной сигнал изменяет предисторию. 

Конечным автоматом Мили называется шестерка объектов $A=<S,X,Y,s_0,\delta,\lambda>$, где:
- S -  конечное непустое множество состояний
- X - конечное непустое мноество входных сигналов
- Y - конечное непустоне множество выходных сигналов
- $s_0\in{S}$ - начальое состояние
- $\delta:S\times{X}\to{S}$ - функция переходов
- $\lambda:S\times{X}\to{Y}$ - функция выходов
',
        ]);

        $questions = [
            [
                'q' => 'Преобразователь информации, реакция которого зависит от его текущего состояния?',
                't' => 'task',
                'a' => 'автомат'
            ],
            [
                'q' => 'Объекты из которых состоит конечный автомат',
                'a' => [
                    'Множество состояний',
                    'Множество выходных функций',
                    'Множество входных функций',
                    'Множесво выходных сигналов',
                    'Функция перехода из одного состояния в другое',
                    'Множество предисторий',
                    'Функция выходов',
                    'Множество входных сигналов'
                ],
                'c' => [true, false, false, true, true, false, true, true]
            ],
            [
                'q' => 'Что делает автомат конечным?',
                't' => 'test_one',
                'a' => [
                    'Конечное колличество состояний',
                    'Конечное множество классов предисторий',
                    'Ограниченность памяти',
                    'Конечное множество входных сигналов'
                ],
                'c' => [false, true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Эквивалентность КА',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Два конечных автомата эквивалентны, если реализуемые ими отображения вход-выход эквивалентны. КА реализует отображение бесконечного множества последовательностей входных последовательностей сигналов в бесконечное множество выходных последовательностей сигналов. Поэтому автоматные отображения нельзя сравнить простым перечислением их значений на всех возможных аргументах.

Пусть 
- $A=<S,X,Y,s_0,\delta,\lambda>$ - конечный автомат
- $\varSigma$ - алфавит
- $\varSigma^*$ - множество цепочек из элементов $\varSigma$
- $\varepsilon$ - пустая цепочка (не содержащая символов)
- ^ - операция конкатенации (склеивания) цепочек (aabb^aa=aabbaa, но этот знак обычно опускают и пишут просто aabbaa)
- $\alpha,\beta,\gamma...$ - цепочки

★ Очевидно, что $\varepsilon$ - нейтральный элемент (единица) конкатенации: $a\varepsilon=\varepsilon{a}=a$

Расширенными функциями перехода и выхода автомата $A$ называются следующие функции:
- $\delta^*:S\times{X^*}\to{S}\quad\begin{cases}\delta^*(s,\varepsilon)=s\\\delta^*(s,a\alpha)=\delta^*(\delta(s,a),\alpha)\end{cases}$
- $\lambda^*:S\times{X^*}\to{Y^*}\quad\begin{cases}\lambda^*(s,\varepsilon)=\varepsilon\\\lambda^*(s,a\alpha)=\lambda(s,a)\lambda^*(\delta(s,a),\alpha)\end{cases}$

Состояния автомата, в которые он не может попасть называются **недостижимыми**. Остальные состояния автомата называются **достижимыми**.

$s\in{S}$ - достижимо $\iff\exists{\alpha}\in{X^*}\quad\delta^*(s_0,\alpha)=s$
$s\in{S}$ - недостижимо $\iff\forall{\alpha}\in{X^*}\quad\delta^*(s_0,\alpha)\not=s$

Достижимое множество состояний КА строится с помощью алгоритма, основанного на индукции.

Разобьём алгоритм на последовательные шаги.

На $i$-м шаге индукции будем строить множество $Q_i$ состояний, достижимых из начального состояния автомата некоторой входной цепочки длины не более чем $i$.
- $Q_0=\lbrace{s_0}\rbrace$
- $\forall{i}\space{Q_i}=Q_{i-1}\lor(\lor_{s\in{Q_{i-1}}}\lor_{x\in{X}}\delta(s,x))$

Не более чем за $|S|$ шагов, окажется так, что $Q_{k+1}=Q_k$. Это $Q_k$ будет включать в себя все достижимые состояния автомата $A$.

Конечные автоматы $A=<S_A,X_A,Y_A,s_{0_A},\delta_A,\lambda_A>$ и $B=<S_B,X_B,Y_B,s_{0_B},\delta_B,\lambda_B>$ называются **эквивалентными** если выполнены два условия:
- Их входные алфавиты совпадают  $X_A=X_B=X$
- Реализуемые ими отображения совпадают $\forall{\alpha}\in{X^*}\quad\lambda_A^*(s_{0_A},\alpha)=\lambda_B^*(s_{0_B},\alpha)$

**Прямым произведением** конечных автоматов $A=<S_A,X,Y_A,s_{0_A},\delta_A,\lambda_A>$ и $B=<S_B,X,Y_B,s_{0_B},\delta_B,\lambda_B>$ с одинаковым входным алфавитом $X$ называется автомат $A\times{B}=<S_A\times{S_B},X_B,Y_A\times{Y_B},(s_{0_A}, s_{0_B}),\delta_{A\times{B}},\lambda_{A\times{B}}>$, где
- $\forall{s_A\in{S_A}},\forall{s_B\in{S_B}},\forall{x\in{X}}\quad\delta_{A\times{B}}((s_A,s_B),x)=(\delta_A(s_A,x),\delta_B(s_B,x))$
- $\forall{s_A\in{S_A}},\forall{s_B\in{S_B}},\forall{x\in{X}}\quad\lambda_{A\times{B}}((s_A,s_B),x)=(\lambda_A(s_A,x),\lambda_B(s_B,x))$

КА, являющийся прямым произведением двух КА, в качестве состояний имеет пары состояний исходных автоматов, выходной алфавит есть множество пар выходных символов автоматов-множителей, а функции переходов и выходов определены покомпонентно. 

Прямое произведение конечных автоматов - это просто два стоящих рядом независимодействующих автомата, синхронно работающих на одном общем входе.

**Теорема Мура**. Два конечных автомата $A=<S_A,X,Y_A,s_{0_A},\delta_A,\lambda_A>$ и $B=<S_B,X,Y_B,s_{0_B},\delta_B,\lambda_B>$ с одинаковым входным алфавитом являются эквивалентными тогда и только тогда, когда для любого достижимого состояния $(s_A,s_B)$ в их прямом поизведении $A\times{B}$ справедливо $\forall{x}\in{X}\quad\lambda_A(s_A,x)=\lambda_B(s_B,x)$.

*Доказательство:* (Необходимость) Пусть $A$ и $B$ эквивалентны, то есть 
->$\forall\alpha\in{X^*}\quad{\lambda_A^*(s_{0_A},\alpha})=\lambda_B^*(s_{0_B},\alpha)$<-
(любую входную последовательность автоматы преобразуют в одинаковые последовательности)

Докажем, что $\forall{(s_A,s_B)\in{S_A\times{S_B}}}$:
->$(s_A,s_B)$ достижимо $\implies\forall{x}\in{X}\quad\lambda_A(s_A,x)=\lambda_B(s_B,x)$<-
(каждый входной символ, встречающийся по пути к достижимой паре  состояний автоматы преобразуют в одинаковые символы)

По определению:
->$(s_A,s_B)$ - достижимо $\iff\exists{\alpha}\in{X^*}\quad\delta^*((s_{0_A},s_{0_B}),\alpha)=(s_A,s_B)$<-
(если состояние достижимо то найдется последовательность, после преобразования которой автомат переходит в это состояние)

Таким образом нужно доказать, что:
->$\forall\alpha\in{X^*}\quad{\lambda_A^*(s_{0_A},\alpha})=\lambda_B^*(s_{0_B},\alpha)$<-
->$\Downarrow$<-
->$\forall{(s_A,s_B)\in{S_A\times{S_B}}}\space\exists\beta\in{X^*}\space\delta^*((s_{0_A},s_{0_B}),\beta)=(s_A,s_B)\implies\forall{x\in{X}}\space\lambda_A(s_A,x)=\lambda_B(s_B,x)$<-

Предположим противное:
->$\exists{(s_A,s_B)\in{S_A\times{S_B}}}\space\exists\beta\in{X^*}\space\delta^*((s_{0_A},s_{0_B}),\beta)=(s_A,s_B)\And\exists{x\in{X}}\space\lambda_A(s_A,x)\not=\lambda_B(s_B,x)$<-
(предположим что найдется такая достижимая пара пара состояний, по пути к которой встречается символ, который автоматы преобразуют в разные символы)

Положим $\alpha=\beta{x}$, тогда:

->$\lambda_A^*(s_{0_A},\alpha)=\lambda_A^*(s_{0_A},\beta{x})=\lambda_A^*(s_{0_A},\beta)\lambda_A(\delta^*(s_{0_a},\beta),x)=\lambda_A^*(s_{0_A},\beta)\lambda_A(s_A,x)$<-
->$\not=$<-
->$\lambda_B^*(s_{0_B},\alpha)=\lambda_B^*(s_{0_B},\beta{x})=\lambda_B^*(s_{0_B},\beta)\lambda_B(\delta^*(s_{0_B},\beta),x)=\lambda_B^*(s_{0_B},\beta)\lambda_B(s_B,x)$<-

Отсюда $\exists\alpha\in{X^*}\quad{\lambda_A^*(s_{0_A},\alpha})\not=\lambda_B^*(s_{0_B},\alpha)$, что противоречит условию ∎

(Достаточность) Пусть $\forall{(s_A,s_B)\in{S_A\times{S_B}}}$:
->$(s_A,s_B)$ достижимо $\implies\forall{x}\in{X}\quad\lambda_A(s_A,x)=\lambda_B(s_B,x)$<-

Докажем, что $A$ и $B$ эквивалентны, то есть
->$\forall\alpha\in{X^*}\quad{\lambda_A^*(s_{0_A},\alpha})=\lambda_B^*(s_{0_B},\alpha)$<-

Индукция по длине $l$ входных цепочек.

База: $l=0$, тогда  $\lambda_A^*(s_{0_A},\varepsilon)=\varepsilon=\lambda_B^*(s_{0_B},\varepsilon)$

Шаг:  Пусть для $l=t\quad\forall\alpha\in{X^*}\quad{\lambda_A^*(s_{0_A},\alpha})=\lambda_B^*(s_{0_B},\alpha)$

Докажем, что равенство выполняется и для $l=t+1$. Пусть $\alpha$ - произвольная цепочка длины $t$. Поскольку состояния $\delta^*_A(s_{0_A},\alpha)$ и $\delta^*_B(s_{0_B},\alpha)$ достижимы в $A$ и $B$ соответственно, то:
->$\forall{x}\in{X}\space\lambda_A(\delta^*_A(s_{0_A},\alpha),x)=\lambda_B(\delta^*_B(s_{0_B},\alpha),x)$(из условия)<-
Тогда:

->$\lambda_A^*(s_{0_A},\alpha{x})=\lambda_A^*(s_{0_A},\alpha)\lambda_A(\delta^*(s_{0_a},\alpha),x)=\lambda_B^*(s_{0_B},\alpha)\lambda_B(\delta^*(s_{0_B},\alpha),x)=\lambda_B^*(s_{0_B},\alpha{x})$<-

Так как мы брали произвольные $\alpha$ и $x$, то $\alpha{x}$ длины $l=t+1$ также произвольна. ∎',
        ]);

        $questions = [
            [
                'q' => 'Как назавают элемент  $e\in{X}$, если $\forall{a\in{X}}\space{ea}=ae=a$',
                't' => 'task',
                'a' => 'нейтральный;нейтральныйэлемент;единица'
            ],
            [
                'q' => 'Выберите условия эквивалентности конечных автоматов $A=<S_A,X_A,Y_A,s_{0_A},\delta_A,\lambda_A>$ и $B=<S_B,X_B,Y_B,s_{0_B},\delta_B,\lambda_B>$',
                'a' => [
                    '$\forall{\alpha}\in{Y^*}\quad\lambda_A^*(s_{0_A},\alpha)=\lambda_B^*(s_{0_B},\alpha)$',
                    '$X_A=X_B$',
                    '$\forall{\alpha,\beta}\in{X^*}\quad\lambda_A^*(s_{0_A},\alpha)=\lambda_B^*(s_{0_B},\beta)$',
                    '$\forall{\alpha}\in{X^*}\quad\lambda_A^*(s_{0_A},\alpha)=\lambda_B^*(s_{0_B},\alpha)$'
                ],
                'c' => [false, true, false, true]
            ],
            [
                'q' => 'Влияет ли один из КА прямого произведения КА на состояния другого?',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет',
                    'Да, если у них одинаковые состояния',
                    'Да, если у них разные состояния'
                ],
                'c' => [false, true, false, false]
            ],
            /*[
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ]*/
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Минимизация КА',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Пусть $A=<S,X,Y,s_0,\delta,\lambda>$ - КА

Важной задачей является нахождение минимального автомата, который реализует заданное автоматное отображение.

Два состояния $p$ и $q$ конечного автомата называются эквивалентными $(p\approx{q})$, если $\forall{\alpha\in{X^*}}\space\lambda^*(p,\alpha)=\lambda^*(q,\alpha)$.

Эквивалентные состояния можно объединить в один класс и построить новый автомат, состояниями которого являются классы эквивалентности состояний. Таким образом получится новый автомат, эквивалентный исходному.

Рассмотрим алгоритм определения максимального отношения эквивалентности на множестве состояний КА.

Алгоритм состоит в последовательном построении на множестве состояний автомата разбиений $\pi_0...\pi_{\infty}$, таких, что в один класс разбиений $\pi_i$ попадают $i$-эквивалентные состояния, т.е. те которые неразличимы входными цепочками длины $i$. Такие состояния будем считать находящимися в отношении эквивалентности $\approx_i$. Если $\neg(p\approx_i{q})$, то $p$ и $q$ назовем $i$-различимыми. Из определения $p\approx_i{q}\iff(\forall\alpha\in{X^*},|\alpha|\leq{i})\space\lambda^*(p,\alpha)=\lambda^*(q,\alpha)$

**Теорема**. Пусть $p\approx_iq,i>1$. Для того, чтобы $p\approx_{i+1}q$ необходимо и достаточно, чтобы $\forall{x}\in{X}\space\delta(p,x)\approx_i\delta(q,x)$.

*Доказательство:* (Необходимость) Нужно доказать, что:
->$p\approx_{i+1}q\implies\forall{x}\in{X}\space\delta(p,x)\approx_i\delta(q,x)$<-
Докажем контрапозицию:
->$\exists{x}\in{X}\space\neg\delta(p,x)\approx_i\delta(q,x)\implies\neg{p}\approx_{i+1}q$<-

Если состояния $\delta(p,x)$ и $\delta(q,x)$, в которые попадает автомат из $p$ и $q$ под воздействием $x$, $i$-различимы, то пусть $x_1x_2...x_i$ - цепочка входных сигналов, их различающая. Тогда очевидно, что цепочка $xx_1x_2...x_i$ длиной $i+1$ различает $p$ и $q$.

(Достаточность) Нужно доказать, что:
->$\forall{x}\in{X}\space\delta(p,x)\approx_i\delta(q,x)\implies{p}\approx_{i+1}q$<-
Из определения расширенной функции переходов:
->$\lambda^*(p,x\alpha)=\lambda(p,x)\lambda^*(\delta(p,x),\alpha)$ и $\lambda^*(q,x\alpha)=\lambda(q,x)\lambda^*(\delta(q,x),\alpha)$<-

Поскольку $i>1$ $p\approx_iq$, то $\lambda(p,x)=\lambda(q,x)$.

Из того, что $\delta(p,x)\approx_i\delta(q,x)$, следует, что  $\forall\alpha\in{X^i}\space\lambda^*(\delta(p,x),\alpha))=\lambda^*(\delta(q,x),\alpha)$. 

Следовательно для любых цепочек $\beta$ длины $i+1$ $\lambda^*(p,\beta)=\lambda^*(q,\beta)$, т.е.  $p\approx_i{q}$. ∎

**Теорема**. Пусть $\pi_{i+1}=\pi_i$, тогда  $\forall{j>i}\space\pi_j=\pi_i$.

*Доказательство:* Из доказанного выше следует, что:
->$\forall{p,q}\in{S}\space{p\approx_{i+1}q}\iff{p\approx_iq}\And\forall{x\in{X}}\space\delta(p,x)\approx_i\delta(q,x)$<-

Обозначим $R(p,q,i)\equiv\forall{x}\in{X}\space\delta(p,x)\approx_i\delta(q,x)$. Тогда доказанное утверждение предыдущей теоремы запишется:
->$\forall{p,q}\in{S}\space{p\approx_{i+1}q}\iff{p\approx_iq}\And{R}(p,q,i)$<-
Пусть теперь $p\approx_{r+1}q=p\approx_rq$. Тогда $\forall{p,q\in{S}}\space{p}\approx_rq\iff{p}\approx_rq\And{R}(p,q,i)$. Но это значит, что $\forall{p,q}\in{S}p\approx_rq\implies{R(p,q,r)}$.

Предположим теперь, что для некоторого $j>r\approx_j=\approx_r,$ но $\approx_{j+1}\not=\approx_j$. Это значит $\neg(\forall{p,q}\in{S}p\approx_jq\implies{R}(p,q,j))$. Однако, поскольку $\approx_j=\approx_r$, а $R$ зависит только от $\approx_j$, то это противоречит утверждению  $\forall{p,q}\in{S}\space{p}\approx_rq\implies{R}(p,q,r)$, и, следовательно наше предположение неверно. ∎',
            'examples' => '1) Минимизировать КА, заданный таблицей:

->$\begin{array}{|c|c|c|c|c|c|c|c|c|}
    & s_0 & s_1 & s_2 & s_3 & s_4 & s_5 & s_6 & s_7 \\\
   0&0/s_7&0/s_2&1/s_0&0/s_7&0/s_2&1/s_3&0/s_5&0/s_6\\\
   1&0/s_2&0/s_4&0/s_2&0/s_5&0/s_1&0/s_5&0/s_6&0/s_0
\end{array}$<-

$S=\lbrace{s_0,s_1,s_2,s_3,s_4,s_5,s_6,s_7}\rbrace$

1 шаг: Разобьем множество $S$ на классы эквивалентности:
->$S_{0}=\lbrace^{(00)}{s_0,s_1,s_3,s_4,s_6,s_7}\rbrace,\quad{S_{1}=\lbrace^{(10)}{s_2,s_5}\rbrace}$<-

(В $S_0$ попали те внутренние состояния, которые выдают на порядке входных символов $0,1$ символы $0,0$. В $S_1$ попали те внутренние состояния, которые выдают на порядке входных символов $0,1$ символы $1,0$ )

2 шаг: Смотрим, в какой из классов присходит переход из рассматриваемого состояния на порядке входных символов $0,1$:

- $s_0$ переходит соответственно в $s_7$ и $s_2$ т.е. в $S_{0}$ и $S_{1}$
- $s_1$ переходит соответственно в $s_2$ и $s_4$ т.е. в $S_{1}$ и $S_{0}$
- $s_2$ переходит соответственно в $s_0$ и $s_2$ т.е. в $S_{0}$ и $S_{1}$
- $s_3$ переходит соответственно в $s_7$ и $s_5$ т.е. в $S_{0}$ и $S_{1}$
- $s_4$ переходит соответственно в $s_2$ и $s_1$ т.е. в $S_{1}$ и $S_{0}$
- $s_5$ переходит соответственно в $s_3$ и $s_5$ т.е. в $S_{0}$ и $S_{1}$
- $s_6$ переходит соответственно в $s_5$ и $s_6$ т.е. в $S_{1}$ и $S_{0}$
- $s_7$ переходит соответственно в $s_6$ и $s_0$ т.е. в $S_{0}$ и $S_{0}$

Разбиение второго шага имеет вид:
->$S_0=\lbrace^{(S_0S_1)}{s_0,s_3}\rbrace,S_1=\lbrace^{(S_1S_0)}{s_1,s_4,s_6}\rbrace,S_2=\lbrace^{(S_0S_1)}{s_2,s_5}\rbrace,S_3=\lbrace^{(S_0S_0)}{s_7}\rbrace$<-

($\lbrace{s_0,s_3}\rbrace$ и $\lbrace{s_2,s_5}\rbrace$ не объединяются, так как они находились в разных классах на предыдущем шаге)

3 шаг: Построим разбиение на порядке  $0,1$:
->$S_0=\lbrace^{(S_3S_2)}{s_0,s_3}\rbrace,S_1=\lbrace^{(S_2S_1)}{s_1,s_4,s_6}\rbrace,S_2=\lbrace^{(S_0S_2)}{s_2,s_5}\rbrace,S_3=\lbrace^{(S_1S_0)}{s_7}\rbrace$<-

Разбиения второго и третьего шагов совпадают, т.е. процесс стабилизировался.

Построим новую таблицу автомата:

- в $S_0$ выдает $0,0$ и переходит в $S_3,S_2$
- в $S_1$ выдает $0,0$ и переходит в $S_2,S_1$
- в $S_2$ выдает $1,0$ и переходит в $S_0,S_2$
- в $S_3$ выдает $0,0$ и переходит в $S_1,S_0$

$\begin{array}{|c|c|c|c|c|}
		 & S_0&S_1&S_2&S_3\\\
   0 & 0/S_3&0/S_2&1/S_0&0/S_1\\\
   1 & 0/S_2&0/S_1&0/S_2&0/S_0
\end{array}$
'
        ]);

        $questions = [
            [
                'q' => 'Процесс уменьшения числа состояний автомата',
                't' => 'task',
                'a' => 'минимизация;минимизацияавтомата'
            ],
            [
                'q' => 'Когда два состояния КА  $s_1$ и $s_2$ эквивалентны?',
                't' => 'test_one',
                'a' => [
                    '$\forall{\alpha\in{X^*}}\space\lambda^*(s_1,\alpha)=\lambda^*(s_2,\alpha)$',
                    '$\exists{\alpha\in{X^*}}\space\lambda^*(s_1,\alpha)=\lambda^*(s_2,\alpha)$',
                    '$\forall{\alpha\in{X^*}}\space\lambda^*(s_1,\alpha)\approx\lambda^*(s_2,\alpha)$',
                    '$\exists{\alpha\in{X^*}}\space\lambda^*(s_1,\alpha)\approx\lambda^*(s_2,\alpha)$'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'В кааком случае нужно остановить процесс минимизации автомата?',
                't' => 'test_one',
                'a' => [
                    'Когда получим число классов равное половине мощности исходного множества состояний',
                    'Когда множество состояний будет пустым',
                    'Когда на двух последовательных шагах получаем одинаковое разбиение',
                    'Когда два класса эквивалентности совпадают'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Любой ли автомат можно минимизировать?',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [true, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        /*$lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Эквивалентность КА',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '',
        ]);

        $questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);*/

        /*$lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Эквивалентность КА',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '',
        ]);

        $questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [true, false, false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);*/

        $lesson = Lesson::Create([
            'block_id' => $blocks[1]->id,
            'active' => true,
            'name' => 'Построение КА с заданными свойствами',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'В задачах на построение КА необходимо построить дианрамму или автоматную таблицу КА, выполняющую определенные, четко сформулированные операции с последовательностями символов из $A_{in}$. Эти последовательности могут быть либо произвольными либо специального вида, что оговаривается в условиях. 

Перед решением задачи нужно проиллюстрировать на примере работу автомата. Пример не только поможет решить задачу, но также поможет в последующей проверке функионирования автомата. 

Будем считать, что сигналы подаются и считываются справа налево. 

Запись  $1234\to{4321}$ означает, что:

- в момент $t=0$ на входе $4$, на выходе $1$
- в момент $t=1$ на входе $3$, на выходе $2$
- в момент $t=2$ на входе $2$, на выходе $3$
- в момент $t=3$ на входе $1$, на выходе $4$

Решая задачу на построение КА, необходимо разбить процесс функционирования автомата на элементарные ситуации, для каждой из которых известно, что должен делать автомат, попав в нее. Также, необходимо для всех входов уметь указать в какую ситуацию перейдет автомат в следующий такт. Для каждой ситуации назначается свое внутреннее состояние КА.

Нужно уделить внимание первоначальной ситуации $q_0$, а также расписать все состояния автомата.

Далее можно строить диаграмму или таблицу,  описывающую работу автомата.',
        ]);

        $questions = [

        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Основные понятия и определения',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Графом** $G$ будем называть пару множеств $G=<V,E>$
- $V$ - множество вершин (конечное)
- $E$ - множество ребер (неупорядоченных пар различных элементов множества $V$)

Каждую пару $e=(u,v)\in{E}$ называют **ребром** графа $G$ и говорят, что $x$ соединяет $u$ и $v$. В этом случае вершины $u$ и $v$ называют **смежными**, а вершину $u\space(v)$ и ребро $e$ **инцидентными**.

Граф, в котором пары вершин могут соединяться более чем одним ребром называют **мультиграфом**, а соответствующие ребра называют **кратными**.

Мультиграф, в котором одна и та же вершина может соединяться ребром, называют **псевдографом**, а соответствующее ребро называют петлёй.

Граф $G=<V,E>$ называется **ориентированным**, если множество $E$ состоит из упорядоченных пар различных вершин, в противном случае граф называется **неориентированным**.

Граф называют **помеченным**, если его вершины отличаются одна от другой какими-либо пометками.

Два графа называют **изоморфными**, если между их множествами вершин существует взаимооднозначное соответствие, сохраняющее смежность.

**Подграфом** графа $G$ называется граф, у которого все вершины и ребра принадлежат $G$.

**Маршрутом** в графе $G$ называется чередующаяся последовательность вершин и ребер, эта последовательность начинается и заканчивается вершиной, после вершины идет инцидентное ей ребро, после ребра инцидентная ему вершина.

Маршрут, в котором нет повторяющихся ребер называют **цепью**, если нет и повторяющихся вершин, то **простой цепью**.

Маршрут, в котором начальная и конечная вершины совпадают называют **циклом**.

Граф называется **связным**, если любая его пара вершин соединена простой цепью.

Максимальный связный подграф графа назывется **компонентой связности графа**.

Ребро графа называется **мостом**, если его удаление увеличивает число компонент связности графа.

Число ребер, инцидентных данной вершине $v$ называется **степенью вершины** и обозначается $\deg{v}$.

Вершина нулевой степени называется **изолированной**.

**Теорема**. Сумма степеней всех вершин графа равна удвоенному числу ребер.

*Доказательство:* Каждое ребро инцидентно двум вершинам, значит вносит две единицы в сумму степеней вершин графа. 

**Следствие.** В каждом графе число вершин с нечетными степенями четно.

*Доказательство*: Разделим множество вершин графа на два множества: в первом будут все вершины с нечетными степенями, а во втором с четными степенями. Очевидно, сумма степеней вершин с четными степенями четна, как сумма четных чисел. Также, сумма степеней всех вершин графа четна, так как равна удвоенному число ребер. Значит и сумма степеней вершин с нечетными степенями четна, но это может произойти только в том случае, когда их колличество четно. ∎

Граф называется **регулярным** степени $r$, если все его вершины имеют одинаковую степень $r$.

Граф называется **полным**, если любые две его вершины смежны. Обозначается $K_n$, где $n$ - число вершин графа.

Граф называется **полным двудольным**, если множество его вершин разбито на 2 группы: любые две вершины из разных групп смежны, а из одной группы смежными не являются. Обозначается $K_{nm}$, где $n$ - число вершин первой группы, $n$ - число вершин второй группы.

**Дополнением** графа $G$ называется граф $\overline{G}$, который в качестве вершин содержит вершины графа $G$, причем две вершины графа $\overline{G}$ смежны тогда и только тогда, когда они не смежны в $G$.

#### Способы задания графов

✔︎ Матрица смежностей графа

$n\times{n}$ - матрица $A=||a_{ij}||,\quad{a_{ij}}=\begin{cases}1,\quad{v_i,v_j\space\text{смежны}}\\0,\quad{v_i,v_j}\space\text{не смежны}\\\infty\quad{i=j}\end{cases}$

✔︎ Матрица инциденций графа

$n\times{m}$ - матрица $B=||b_{ij}||,\quad{b_{ij}}=\begin{cases}1,\quad{v_i\space\text{инцидентна}\space{r}_j}\\0,\quad\space\text{иначе}\end{cases}$

✔︎ По определению (множества $V,E$)

✔︎ Диаграмма

✔︎ Списки смежностей'
        ]);

        $questions = [
            [
                'q' => 'Как называют вершину нулевой степени',
                't' => 'test_one',
                'a' => [
                    'Дополнительная',
                    'Дополняющая',
                    'Изолированная',
                    'Одинокая'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Маршрут, в котором нет повторяющихся ребер',
                't' => 'test_one',
                'a' => [
                    'Цикл',
                    'Цепь',
                    'Путь',
                    'Простой маршрут'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Граф, любые две вершины которого смежны',
                't' => 'test_one',
                'a' => [
                    'Двудольный',
                    'Смежный',
                    'Полный',
                    'Простой'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Как называют ребро, выходящее и входящее в одну и ту же вершину',
                't' => 'test_one',
                'a' => [
                    'Цикл',
                    'Ветвь',
                    'Оборот',
                    'Петля'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Найдите сумму степеней вершин в графе с 16 ребрами',
                't' => 'task',
                'a' => '32'
            ],
            [
                'q' => 'Пусть имеется группа из 5 человек. Может ли быть так что среди них у первого 3 знакомых, у второй - 4, а у всех остальных по два знакомых?',
                'a' => [
                    'Да',
                    'Нет'
                ],
                't' => 'test_one',
                'c' => [false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Деревья',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Связный граф называется **деревом**, если он не содержит замкнутых путей.

Вершины дерева степени 1 называют **концевыми**, остальные - **внутренними**.

Число всех вершин в дереве называется **порядком** дерева.

$n$-дерево - дерево порядка $n$.

**Теорема(о числе помеченных деревьев)**. Число помеченных деревьев с $n$ вершинами равно $n^{n-2}$.

*Доказательство*: Покажем, что существует взаимооднозначное соответствие между множеством помеченных $n$-деревьев и множеством слов длины $n$ в алфавите $\lbrace{1,2,...,n}\rbrace$. По правилу произведения число упорядоченных слов равно $n^{n-2}$, тогда деревьев столько же.

Сопоставление дереву упорядоченного набора (кода Прюфера) $$ называют **кодированием** дерева, обратный процесс - **декодированием**.

Алгоритм кодирования:

1) Положим $i=1$
2) Пусть $v_j$ - концевая вершина дерева с наименьшей меткой, тогда $a_i$ - метка смежной с ней вершины.
3) Удалить из дерева $v_i$ и инцидентное ей ребро. Если в дереве осталось более двух вершин, то увеличиваем $i$ на единицу и идем ко второму шагу, иначе завершаем процесс.

Декодирование дерева $T$:

Пусть $B_0=\lbrace{1...n}\rbrace,\space{b_1}=\min{B_0},b_1\not\in(a_1...a_{n-2})$, тогда  $b_1$ - номер концевой вершины, смежной с $a_1$ и дерево содержит ребро $(b_1,a_1)$.

Набор $(a_2...a_{n-2})$ кодирует дерево $T_1$ с множеством пометок вершин $B_1=B/{b_1}$ ($T_1$ получено из $T$ удалением вершины $b_1$ и ребра $(a_1,b_1)$)
->$...$<-

$k$-й шаг. Рассмотрим дерево $T_{k-1}$ с множеством пометок $B_{k-1}$. $b_k=\min{B_{k-1}},b_k\not\in(a_k...a_{n-2})$. Далее константируем наличие в $T$ ребра $(a_k,b_k)$.

После $n-2$ шагов будут выявлены $n-2$ ребра дерева $T$.

**Стягивающим** (остовным) деревом связного графа $G$ называют его подграф, содержащий все вершины $G$ и являющийся деревом.'
        ]);

        $questions = [
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
                'q' => 'Найдите число помеченных деревьев с 7 вершинами',
                't' => 'task',
                'a' => '16807'
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Укладка графов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Граф $G$ **укладывается** на поверхности $S$, если его диаграмму можно так нарисовать на этой поверхности, что его ребра будут пересекаться только в вершинах.

Граф называется **планарным**, если его можнот уложить на плоскости.

**Плоским** называется граф уже уложенный на плоскости.

**Гранью** плоского графа называется часть плоскости, ограниченная ребрами графа и не содержащая внутри себя других ребер графа.

Пусть $G$ - плоский граф. Построим граф $G^*$:

Внутри каждой грани выделим по одной вершине нового графа, если 2 грани имеют общее ребро, то соответствующие им новые вершины соединены ребром нового графа.

$G^*$ двойственный для $G$.

**Теорема**. Для любого связного плоского графа $n-m+f=2\space(*),$ где $n$ - число вершин, $m$ - число ребер, $f$ - число граней.

*Доказательство:* Пусть $T$ - стягивающее дерево графа $G$. $T$ имеет $n$ вершин, $n-1$ ребро и 1 грань, т.о. $n-m+1+1=2$. Будем последовательно добавлять к $T$ недостающие ребра графа $G$. При добавлении одного ребра число граней также увеличивается на 1, т.к. новое ребро делит грань, на границе которой лежат его вершины на две грани, т.о. после каждого шага процедуры соотношение $(*)$ остается справедливым. После добавления остальных $m-n+1$ ребер $T$ перейдет в $G$, для которого $(*)$ также справедливо. ∎

**Следствие 1**. Число граней плоского графа $f=m+k-n+1$, где $k$ - число компонент связности графа.

*Доказательство:* Пусть $f_i=m_i-n_i+2$ - число граней $i$-й компоненты связности. При суммировании $f_i$ от 1 до $k$ внешняя грань будет учтена $k$ раз, поэтому:
->$f=\displaystyle\sum^{k}_{i=1}{f_i-k+1}=m-n+2k-k+1=m-n+k+1$<-

**Следствие 2**. Для любого связного планарного графа с числом вершин не менее трех выполняется  $m\leq{3n-6}$.

*Доказательство:* Рассмотрим какую-нибудь плоскую укладку рассматриваемого графа. Если в графе 2 ребра, то невыполнение неравенства поверяется непосредственно. Пусть $n\geq{3}$.

Пусть у плоского графа $f$ граней, а $i$-я ограничена $m_i$ ребрами. Поскольку в графе нет петель и кратных ребер, а ребер меньше 3, то:
->$m_j\geq{3},1\leq{i}\leq{f},\displaystyle\sum^f_{i=1}{m_i\geq{3f}\quad(1)}$<-

Если ребро является мостом, то оно входит в границу только одной внешней грани, иначе в границу ровно двух граней, следовательно:
->$\displaystyle\sum^f_{i=1}{m_i}\leq{2m}\quad(2)$<-

$(1),(2)\implies{3f}\leq\displaystyle\sum^f_{i=1}{m_i}\leq{2m},$ т.е. $3f\leq{2m}$

С учетом формулы Эйлера $3(m-n+2)\leq{2m}$

**Следствие 3**. В любом плоском графе есть вершина степени не больше 5.

*Доказательство:* Предположим противное, т.е. $deg(v_i)\geq{6}\space\forall{v_i\in{V}}$, тогда по теореме 1:
->$2m=\displaystyle\sum^n_{i=1}{deg(v_i)}\geq{6n}$ или $m\geq{3m}$, что противоречит условию.<-

**Следствие 4**. Граф $K_5$ не является планарным.

*Доказательство:* $m=C^2_5=10$ ребер, $n=5$ вершин $3*5-6=9<10\implies$ следствие 2 не выполняется $\implies\space{K_5}$ не планарен.

**Следствие 5**. Граф $K_{33}$ не является планарным.

*Доказательство:* $n=6,m=9$. Если бы этот граф был планарным, то его плоская укладка содержала бы $f=m-n+2=5$ граней. $\displaystyle\sum_{i}{2m}=18$.

С другой стороны, легко видеть, что в двудольном графе нет циклов длины 3, поэтому каждая грань должна быт ограничена хотя бы 4 ребрами, т.е. $m_i\geq{4},1\leq{i}\leq{5}$, откуда $\displaystyle\sum_{i=1}^5{m_i}\geq{20}$ и предположение о планарности привело к противоречию.

#### Критерий планарности

Подразбиением ребра $(u,v)$ называют его замену на два ребра $(u,w)$ и $(w,v)$, где $w$ - некоторая новая вершина графа.

Два графа называют гомеоморфными, если они могут быть получены из одного и того же графа с помощью подразбиения ребер.

**Теорема (критерий Понтрягина-Куратовского)**. Граф является планарным тогда и только тогда, когда не содержит подграфа, гогеоморфного графу $K_5$ или $K_{33}$.'
        ]);

        $questions = [
            [
                'q' => 'Часть плоскости, ограниченная ребрами графа и не содержащая внутри себя других ребер графа',
                'a' => 'грань',
                't' => 'task'
            ],
            [
                'q' => 'Граф, который можно уложить на плоскости',
                'a' => 'планарный;планарныйграф',
                't' => 'task'
            ],
            [
                'q' => 'Граф, который удалось уложить на плоскость',
                'a' => 'плоский;плоскийграф',
                't' => 'task'
            ],
            [
                'q' => 'Как называется граф, который получается если внутри каждой вершины плоского графа выделить по одной вершине, а затем соединить все пары вершин, грани которых имеют общее ребро?',
                't' => 'test_one',
                'a' => [
                    'Дополнение',
                    'Дополнительный',
                    'Плоский',
                    'Двойственный'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Сколько граней в связном плоском графе с 10 вершинами и 20 ребрами',
                'a' => '12',
                't' => 'task'
            ],
            [
                'q' => 'Сколько ребер в связном плоском графе с 10 гранями и 25 вершинами',
                'a' => '33',
                't' => 'task'
            ],
            [
                'q' => 'Сколько вершин в связном плоском графе с 10 ребрами и 5 гранями',
                'a' => '7',
                't' => 'task'
            ],
            [
                'q' => 'Существует ли плоский граф без петель и кратных ребер, у которого 8 вершин и 15 ребер?',
                'a' => [
                    'Да',
                    'Нет'
                ],
                't' => 'test_one',
                'c' => [true, false]
            ],
            [
                'q' => 'Может ли существовать пятёрка государств, в которой каждая пара государств следует друг за другом?',
                'a' => [
                    'Да',
                    'Нет'
                ],
                't' => 'test_one',
                'c' => [false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Раскраска графов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Раскраской** графа называется преписывание цветов его вершинам, при котором никакие смежные вершины не окрашены одинаковыми красками.

Множество всех вершин одного цвета называется одноцветным классом.

В $n$-раскраске графа используют $n$ цветов, т.о. эта раскраска разбивает граф на $n$ одноцветных классов.

Хроматическое число $\chi(G)$ графа $G$ определяется как наименьшее $n$, при котором граф имеет $n$-раскраску.

Раскраской плоской карты $G$ называется такое преписывание цветов областям $G$, что никакие две смежные области не раскрашены одним цветом.

Карта называется $n$-раскрашиваемой, если существует её раскраска, использующая $n$ и менее цветов.

$\chi(K_n)=n$, так как любые две вершины смежны.

$\chi(K_{33})=2$, так как можно окрасить одну долю в одну краску, а другую - в другую.

#### Гипотеза 4-х красок.

✔︎ Каждый планырный граф 4-раскрашиваем.

✔︎ Всякая плоская карта 4-раскрашиваемая.

**Теорема**. Каждый планарный граф 5-раскрашиваем.

*Доказательство:* Индукция по числу вершин $p$.

База: $p\leq5$, утверждение очевидно.

Пусть теперь $p>5$

Шаг: Предположим, что все плоские графы с не боле чем $p$ вершинами  5-раскрашиваемы.

Пусть $G$ - плоский граф с $p+1$ вершинам. В силу следствия 3 формулы Эйлера в графе $G$ найдется вершина $v$ степени не более 5. По предположению индукции граф $G-v$ - граф $G$ без вершины $v$ 5-раскрашиваем.

Рассмотрим преписывание цветов вершинам графа $G-v$. Цвета обозначим $c_i,i=\overline{1,5}$.

Ясно, что если $c_i$ не используется в раскраске вершин, смежных с $v$, то, приписав $c_i$ вершине $v$ получим 5-раскраску графа $G$.

Если $\deg{v}=5$ и для вершин графа $G$, смежных с $v$, используется все 5 цветов. Пусть $v_1...v_5$ - вершины, смежные с $$, окрашенные цветами $c_1...c_5$ соответственно. Обозначим $G_{13}$ - подграф $G-v$, порожденный всеми вершинами, окрашенными в один из цветов $c_1$ или $c_3$.

Если $v_1$ и $v_3$ принадлежат различным компонентам связности графа $G-v$ можно получить, поменяв друг с другом ($c_1$ на $c_3$ и обратно) цвета вершин той компоненты $G_{13}$, которая содержит $v_1$. В этой 5-раскраске уже нет вершин, смежных с $v$ и окрашенных в $c_1$, поэтому, окрасив $v$ в $c_1$, образуем 5-раскраску $G$.

Если же $v_1$ и $v_3$ принадлежат одной и той же компоненте связности $G_{13}$, то в $G$ между $v_1$ и $v_3$ существует простая цепь, все вершины которой окрашены в $c_1$ и $c_3$. В $G$ среди $v_1...v_5$ найдутся две $v_i$ и $v_j$, которые будут принадлежать разным компонентам связности $G_{ij}$, в противном случае получим противоречие планарности $G$. Пусть это $v_2$ и $v_4$, т.о. если поменять цвета вершин в компоненте $G_{24}$, содержащей $v_2$, то получим 5-раскраску графа $G-v$, и в ней ни одна из смежных с $v$ вершин не будет окрашена в $c_2$, поэтому окрасив $v$ в $c_2$ получим 5-раскраску графа $G$. ∎'
        ]);

        $questions = [
           /* [
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
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [false, false, false, false]
            ],*/
            [
                'q' => 'Найдите $\chi(K_17)$',
                'a' => '17',
                't' => 'task'
            ],
            [
                'q' => 'Найдите $\chi(K_{5,7})$',
                'a' => '2',
                't' => 'task'
            ],

        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Эйлеровы графы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Эйлеровым циклом** графа называется цикл, проходящий через все ребра графа, при том только один раз.

**Эйлеровой цепью** графа называется цепь, проходящая через все ребра графа, при том только один раз.

Связный граф называется **эйлеровым**, если в нем существует эйлеров цикл.

**Теорема**. Связный граф является эйлеровым тогда и только тогда, когда степень каждой его вершины четная.

*Доказательство:* 

(Необходимость) Пусть $G$ - эйлеров граф. Эйлеров цикл этого графа, проходя через каждую его вершину входит в неё по одному ребру и выходит по другому. Значит каждое прохождение вершины по циклу вносит слагаемое 2 в ее степень. Поскольку цикл содержит все ребра графа, то степени всех вершин будут четными.

(Достаточность) Предположим, что степени всех вершин связного графа $G$ чётные. Начнем цепь $p_1$ из произвольной вершины $v_1$ и будем продлевать её, выбирая каждый раз новое ребро. Так как степени всех вершин чётные, то попав в некоторую вершину всегда будем иметь в распоряжении ещё не пройденное ребро. Только лишь попав в $v_1$ закончим построение цепи и $p_1$ будет циклом. Если $p_1$ содержит все ребра $G$, то построен эйлеров цикл, иначе, удалив из $G$ все ребра и изолированные вершины $p_1$, получим граф $G_1$, т.к. степени вершин $G$ и $p_1$ чётные, то и $G_1$ обладает этим свойством. В силу связности $G$ графы $p_1$ и $G_1$ должны иметь хотя бы одну общую вершину $v_2$. Теперь, начиная с $v_2$ построим в $G_1$ цикл $p_2$, подобно построению $p_1$. Объединим $p_1$ и $p_2$. Пройдем часть $p_1$ от $v_1$ до $v_2$, пройдем $p_2$, вернемся в $v_2$ и дойдем в $p_1$ до $v_1$. Так делаем пока не получим эйлеров цикл. ∎

**Алгоритм Флери**. Начинаем цикл с произвольной вершины графа и стираем пройденные ребра, нумеруя их, при этом по ребру, являющемуся мостом, проходим только в случае, когда нет других вариантов.'
        ]);

        $questions = [
            [
                'q' => 'Цикл, который проходит все ребра графа по только 1 разу',
                't' => 'test_one',
                'a' => [
                    'Гамильтонов',
                    'Эйлеров',
                    'Простой',
                    'Особый'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Каким свойством должен обладать связный граф, чтобы быть эйлеровым?',
                't' => 'test_one',
                'a' => [
                    'Степень каждой вершины такого графа должна быть четной',
                    'Степень каждой вершины такого графа должна быть нечетной',
                    'Количество вершин такого графа должно быть четным',
                    'Количество вершин такого графа должно быть нечетным'
                ],
                'c' => [true, false, false, false]
            ],
//            [
//                'q' => '',
//                'a' => [
//                    '',
//                    '',
//                    '',
//                    ''
//                ],
//                'c' => [false, false, false, false]
//            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Гамильтоновы графы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Гамильтоновым циклом** в графе называют цикл, походящий через все вершины графа, при том только один раз.

Граф называется **гамильтоновым**, если в нём существует гамильтонов цикл.

**Теорема.** Если в графе $G$, имеющем $n$ вершин, степень каждой вершины не меньше $\frac{n}{2}$, то граф $G$ является гамильтоновым.

*Доказательство:* Предположим противное. $G$ - не гамильтонов граф. Добавим к $G$ новую вершину, соединив её ребрами со всеми вершинами графа. Если получившийся граф не гамильтонов, то добавим ещё одну новую вершину, как и ранее, соединив её ребрами со всеми вершинами $G$ и т.д. пока не получим гамильтонов граф, который обозначим $\overline{G}$. Это обязательно произойдет, т.к. при добавлении $n$ вершин гамильтонов цикл можно построить, даже не используя ребра графа $G$. Заметим, что никакие две новые вершины не соединены ребром. 

Пусть $k$ - минимальное число новых вершин, которое нужно добавить, чтобы получить $\overline{G}$. В $\overline{G}$ будет $n+k$ вершин. 

Рассмотрим гамильтонов цикл $c=(u,w,v,...,u)$ в $\overline{G}$, где $u$ и $v$ - вершины графа, $w$ - новая вершина. $u$ и $v$ не смежные, т.к. иначе существует гамильтонов цикл в графе не включающем $w$, что противоречит минимальности $k$. По этой причине за каждой вершиной, смежной с $u$, в цикле обязательно должна стоять вершина, не смежная с $v$.
Из условия теоремы следует, что число вершин в $G$, смежных с $u$ будет не меньше чем $\frac{n}{2}$ (степень вершины).

Тогда число вершин, смежных с $u$ в $\overline{G}$ будет не меньше чем $\frac{n}{2}+k$. Поскольку за каждой вершиной, смежной с $u$, в цикле находится вершина, не смежная с $v$, то можно оценить число $d_1$, вершин, не смежных с $v$ в графе $\overline{G}$. $d_1\geq{\frac{n}{2}+k}$.

Для числа $d_2$ вершин, смежных с $v$ в $G$ верно $d_2\geq{\frac{n}{2}+k}$, так как каждая вершина графа либо смежна либо не смежна с $v$, то число всех вершин графа $\overline{G}$ будет не меньше, чем $n+2k$, что противоречит тому, что число вершин графа $\overline{G}$ равно $n+k$. ∎'
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [false, false, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Алгоритмы на графах',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Бинарное отношение** на множестве есть набор упорядоченных пар элементов этого множества.

**Транзитивным замыканием отношения** $I$ называется отношение $I^*$, определяемое следующим образом: $xI^*y$ тогда и только тогда, когда существует последовательность $x_0=x,x_1,x_2,...,x_k=y,k>0$ и $x_0Ix_1,x_1Ix_2,...,x_{k-1}Ix_k$.

Пусть $G=<V,E>$ - ориентированный граф, представляющий отношение $I$. Ориентированный граф $G^*=<V,E^*>$, представляющий транзитивное замыкание $I^*$ отношения $I$ называется **транзитивным замыканием графа** $G$.

Из определения следует, что ребро  $(v_i,v_j)\in{E^*}$, только если в $G$ существует ориентированный путь из $v_i$ в $v_j$ при $v_i\not=v_j$ и ориентированный цикл при $v_i=v_j$.

**Матрицей достижимости** помеченного графа $G=<V,E>,|V|=n$ называется $n\times{n}$-матрица $W=||w_{ij}||$, в которой $w_{ij}=1$, если существует путь из $v_i$ в $v_j$, при $i\not=j$ (т.е. $v_i$ достижима из $v_j$) и цикл, содержащий $v_i$ при $i=j$. В противном случае $w_{ij}=0$.

Матрица смежности $G^*$ одновременно матрица достижимости $G$.

#### Алгоритм Уоршелла

Строим последовательность матриц $W_1,...,W_n$ графов $G_1,...,G_n:G_n=G^*$.

Идея: в матрице достижимости в $i$-й строке располагается информация о том, куда можно пройти с $i$-й вершины. Если, например, $w_{ij}=1$, значит вершина $i$ достижима из вершины $j$, поэтому все вершины, достижимые из $i$ будут также достижимы из $j$.

Вход алгоритма: $A$ - матрица смежности $G$.

Выход алгоритма: $W_n$ - матрица достижимости $G$.

Определяем начальную матрицу $W_0=A$
```javascript
for (k = 1 ; k < n ; k ++)
  for (i = 1 ; i < n ; i ++)
    for (j = 1 ; j < n ; j ++)
      w[i,j]  = w[j,i] || w[i,k]*w[k,i]
```
<br/>

На $k$-м шаге находим матрицу $W_k$, берем $k$-й столбец матрицы $W_{k-1}$. Строку с номером $i$, у которой на $k$-м месе стоит $0$, переписываем в $i$-ю строку матрицы $W_k$. Строку с номером $i$, у которой на $k$-м месте 1, объединяем с помощью операции $\lor$ ("или") с $k$-й строкой и результат в $i$-ю строку $W_k$. Поэлемнтное объединение по правилу:
->$0\lor1=1\lor0=1\lor1=1,\space0\lor0=0$<-

#### Кратчайшие пути.

Граф, каждому ребру которого поставлено в соответствие некоторое положительное число, называемое **весом ребра, называют нагруженным.

**Общим весом пути** называется сумма весов всех ребер, составляющих путь. 

Обозначим вес ребра, соединяющего вершины $u$ и $v$ через $w(u,v)$

Кратчайший путь между двумя вершинами - путь минимального общего веса, соединяющий выбранные вершины.

Общий вес кратчайшего пути между двумя венршинами называется расстоянием между этими вершинами.

Пусть $G=<V,E>,|V|=n$ - нагруженный помеченный ориентированный граф. Весовой матрицей графа $G$ называется $n\toimes{n}$-матрица $W=||w_{ij}||$:
->$w_{ij}=\begin{cases}0\quad\text{ если}\space{v}_i=v_j\\\infty\quad\text{если}\space{v}_i,v_j\space\text{не смежны}\\d\quad\text{ если}\space(v_i,v_j)-\text{ребро веса }d\end{cases}$<-

#### Алгоритм Дейкстры.

Пусть нужно найти расстояние от вершины $x$ до всех остальных вершин графа $G$.

Каждой вершине $v$ графа $G$ присваивается число $d(v)$, равное расстоянию от $x$ до $v$. Перед началом работы $d(v)=w(x,v)$, если ребро, соединяющее $x$ и $v$ существует, иначе $d(v)=\infty$. Проходим вершины $G$ и уточняем значения $d(v)$. На каждом шаге отмечается одна вершина $u$, до которой уже найден кратчайший путь от $x$ на расстояние $d(u)$. Далее $d(u)$ не меняется. Для оставшихся вершин $d(v)$ меняется с учетом того, что искомый путь до них от $x$ пройдет через отмеченную вершину $u$ и завершение, когда все вершины отмечены и получили свои окончательные $d(v)$.

Вход: весовая матрица $W$ графа $G$

Выход: последовательность $d(v)$ кратчайших путей от выбранной вершины $x$ до всех остальных вершин $v$, последовательность списков $pathto(v)$ перечисления вершин кратчайшего пути от $x$ до $v$.

Отметим вершину $x$. Всем вершинам $v\in{V}$ присвоим веса: $d(v)=w(x,v),\space{}pathto(v)=x$ (Начинаем путь с $x$).
Пока остаются непомеченные вершины выполняем:
Находим $u\in{V}:\space{u}$ имеет $\min{d(u)}$ из всех неотмеченных вершин.
Отмечаем $u$.
Для всех остальных неотмеченных вершин $v$, смежных с $u$ выполняем:
```javascript
d=d(u)+w[u,v]
if (d<d(v)) {
  d(v)=d
  pathto(v)=pathto(u),v
}
```
<br/>

#### Алгоритм Флойда

Идея: Пусть $i,j,k$ - вершины графа, расстояния между ними $d_{ij},d_{jk},d_{ik}.$ Если $d_{ij}>d_{ik}+d_{ki}$, то, находя кратчайший путь из вершины $i$ в вершину $j$ выгоднее пройти не напрямую из $i$ в $j$, а через $k$.

Вход: весовая матрица $$.

Выход: матррица расстояний $W_n$ и матрица последовательностей путей $P_n$.

Определим начальную матрицу расстояний $W_0=W=||w_{ij}||$ и $n\times{n}$-матрицу последовательностей путей $P_0=||p_{ij}||$, где $p_{ij}=j$, при $i\not=j$ и $0$ иначе.

```javascript
for (k = 1 ; k <= n ; k ++)
  for (i = 1 ; i <= n ; i ++)
    for (j = 1 ; j <= n ; j ++)
      if ((i != j) && (i != k) && (j != k) && (w[i,j] != w[k,j] != Infinity) && (w[i,k] + w[k,j] < w[i,j])) {
        w[i,j]=w[i,k]+w[k,j]
        p[i,j]=k
      }	
```
<br/>

На $k$-м шаге выбираем $k$-ю строку и $k$-й столбец. Проверяем выполнение $d_{ij}>d_{ik}+d_{kj}$ для всех элементов $w_{ij}$ матрицы $W_{k-1}$ за исключением $k$-й строки и $k$-го столбца. Если неравенство выполняется, то:
1) Строим матрицу $W_k$, заменяя в матрице $W_{k-1}$ элемент $w_{ij}$ на сумму $w_{ik}+w_{kj}$.
2) Строим матрицу $P_k$, заменяя в $P_{k-1}$ элемент $p_{ij}$ на $k$.

Таким образом, алгоритм базируется на использовании последовательности из $n$ преобразований весовой матрицы. При этом на $k$-м шаге матрица $W_k$ представляет длины кратчайших путей между каждой парой вершин $x_i$ и $x_j$ ($x_i,x_j\in{V}$) с тем ограничением, что путь между $x_i$ и $x_j$ содержит в качестве промежуточных только вершины множества $\lbrace{x_1,...,x_k}\rbrace$

Определение по матрицам $W_n$ и $P_n$ кратчайшего пути между $i$ и $j$ выполняется следующим образом:

Расстояние между $i$ и $j$ равно $w_{ij}$ в $W_n$.

Промежуточные вершины пути между $i$ и $j$ определяем по матрице $P_n$, элемент $p_{ij}$ указывает вершину $j$, предшествующую вершине $i$ в кратчайшем пути от $i$ к $j$. Пусть $p_{ij}=k$, тогда путь из $i$ в $j$ проходит через $k$. Если далее $p_{ik}=k$ и $p_{kj}=j$, то считаем что все промежуточные вершины кратчайшего пути найдены, в противном случае повторяем описанную процедуру для вершин $i$ и $k$, $k$ и $j$.

#### Алгоритм обхода графа в глубину и ширину.

Вход: граф $G$, заданный списком смежностей.

Выход: последовательность вершин обхода графа $G$.

```javascript
for (v in V)
	x(v) = 0 // присваиваем всем вершинам нулевые метки
T.put(v) // помещаем в T произвольную вершину
x(v) = 1 // отмечаем эту вершину
while (T.length !== 0) { // если T не пусто
  u = T.get() // извлекаем из T вершину
  x(u) = 1 // отмечаем эту вершину
  for (w in T(u)) { //для всех вершин, смежных с u выполняем
    if (x(w) === 0) { // если w не отмечена
      T.put(w) // помещаем w в T
      x(w) = 1 // отмечаем w
    }
  }
}
```
<br/>

Если $T$ - стек, то обход в глубину.

Если $T$ - очередь, то обход в ширину.
'
        ]);

        $questions = [
            [
                'q' => 'Пусть $I^*$ - транзитивное замыкание отношения $I$, тогда существует последовательность:',
                'a' => [
                    '$x_0=x,x_1,x_2,...,x_k=y,k>0$ и $x_0Ix_1,x_1Ix_2,...,x_{k-1}Ix_k$',
                    '$x_0=x,x_1,x_2,...,x_k=y,k>0$ и $x_0Ix_k,x_1Ix_{k-1},...,x_{k-1}Ix_1$',
                    '$x_0=x,x_1,x_2,...,x_k=y,k>0$ и $x_0Ix_1,x_1Ix_2,...,x_{k-1}Ix_k$',
                    '$x_0=x,x_1,x_2,...,x_k=y,k>0$ и $x_0Ix_1,x_1Ix_2,...,x_{k-1}Ix_k$',
                ],
                'c' => [false, false, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => 'Связность в графах',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Связный граф** - граф, в котором любые две вершины соединены маршрутом.

Наличие пути - отношение эквивалентности, которое задает на множестве вершин графа разбиение на классы эквивалентности, каждый из которых является **компонентой связности**.

**Мост** - ребро, удаление которого увеличивает число компонент связности.

**Точка сочленения** - вершина, удаление которой увеличивает число компонент связности.

**Теорема**. Пусть $v\in{V}$, тогда следующие утверждения эквивалентны&
1) $v$ - точка сочленения графа $G$.
2) $\exists\space{u,w}\in{V},u\not=v,w\not=v:v\in$ любой простой цепи, соединяющей $u$ и $w$.
3) $\exists$ разбиение множества вершин $V/\lbrace{v}\rbrace$ на подмножества $U,W:u\in{U},w\in{W},v\in$ любой простой цепи, соединяющей $u$ и $w$.

**Теорема**. Пусть $e$ - ребро связного графа $G$, тогда следующие утверждения эквивалентны.
1) $e$ - мост
2) $e\not\in$ ни одному простому циклу графа $G$
3) в графе $G\space\exists\space{u,v}\in{V}:e\in$ любой простой цепи, соединяющей $u$ и $v$
4) $\exists$ разбиение множества $V$ на подмножества $U,W:\forall{u}\in{U},w\in{W}:e\in$ простой цепи, соединяющей $u$ и $w$.

**Утверждение** (оценка числа ребер через число вершин и число компонент связности). Пусть $p$ - число вершин, $q$ - число ребер, $k$ - число компонент связности. Тогда:
->$p-k\leq{q}\leq{\frac{(p-k+1)(p-k)}{2}}$<-

*Доказательство*: Докажем, что $p-k\leq{q}$. Индукция по числу вершин.
База: $p=1$, тогда $q=0,k=1\quad0\leq0\implies$ в этом случае оценка верна.
Шаг: Пусть оценка верна для всех графов с числом вершин, меньшим чем $p$.
Рассмотрим граф с $p$ вершинами $G$. Выберем вершину $v$, не являющуюся точкой сочленения. Рассмотрим тогда граф $G-v$. Возможны 2 случая:
1) Пусть $v$ - изолированная вершина, тогда
	$\begin{cases}p\'=p-1\\q\'=q\\k\'=k-1\end{cases}\implies{}p-1-k+1=p-k\leq{q\'}=q\implies{p-k}\leq{q}$
2) Пусть $$ - не изолированная вершина, тогда:
	$\begin{cases}p\'=p-1\\q\'<q\\k\'=k\end{cases}\implies{}p-k=p\'+1-k\'=p\'-k\'+1<{q\'+1}\leq{q}$
  
Докажем, что $q\leq{\frac{(p-k+1)(p-k)}{2}}$.

Число ребер $q$ в графе с $p$ вершинами и $k$ компонентами связности не превосходит число ребер в графе с $p$ вершинами и $k$ компонентами связности, в котором каждая компонента является полным графом.

Рассмотрим такие графы, среди них наибольшее число ребер имеет граф, у которого в $k-1$-й компоненте содержится по 1 вершине, а в $k$-й компоненте $p-k+1$ вершин. Число рёбер в нём ${\frac{(p-k+1)(p-k)}{2}}$, следовательно оценка верна. ∎

**Вершинной связностью** графа $G$ (обозначается $\chi(G)$) называется наименьшее число вершин, удаление которых приводит к несвязному или тривиальному графу.

Граф $G$ называется **$k$-связным**, если $\chi(G)$.

**Реберной связностью** графа $G$ (обозначается $\lambda(G)$) называется наименьшее число ребер, удаление которых приводит к несвязному или тривиальному графу.

Две $\lbrace{u,v}\rbrace$ цепи называются **вершинно-непересекающимся**, если у них нет общих вершин, отличных от $u$ и $v$.

Две $\lbrace{u,v}\rbrace$ цепи называются **реберно-непересекающимся**, если у них нет общих ребер.

Если две цепи вершинно-непересекающиеся, то они реберно-непересекающиеся.

Обозначим $P(u,v)$ - множество вершинно-непересекающихся цепей $<u,v>$.
->$P(u,v)=\lbrace{<u,v>|<u,v>_2\in{P}\implies<u,v>_1\And<u,v>_2=\lbrace{u,r}\rbrace}\rbrace$<-

Множество $S$ вершин (или ребер) графа $G$ разделяет две вершины $u$ и $v$, если $u$ и $v$ принадлежат разным компонентам связности графа $G-S$.

Разделяющее множество ребер называется **разрезом**.

Разделяющее множество вершин для вершин $u,v$ $S(u,v)$  
->$S(u,v)=\lbrace{w\in{V}|G-S=G_1\lor{G_2},\lor{v}\in{G_1},u\in{G_2}}\rbrace$<-

Если $u,v$ принадлежат разным компонентам связности графа $G$, то $|P(u,v)|=0$ и $|S(u,v)|=0$. Поэтому считаем, что $G$ - связный граф.

**Теорема (Менгера)**. Пусть $u$ и $v$ - несмежные вершины в графе $G$. Наименьшее число вершин в множестве, разделяющем $u$ и $v$, равно наибольшему числу вершинно-непересекающихся простых $(u,v)$-цепей
->$\max|P(u,v)|=\min|S(u,v)|$<-'
        ]);

        $questions = [
            [
                'q' => 'Ребро, после удаления которого колличество компонент связности графа увеличится',
                't' => 'task',
                'a' => 'мост'
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
            ]
        ];
        $this->create_questions($lesson, $questions);

        /*$lesson = Lesson::Create([
            'block_id' => $blocks[2]->id,
            'active' => true,
            'name' => '',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => ''
        ]);

        $questions = [
            [
                'q' => '',
                'a' => [
                    '',
                    '',
                    '',
                    ''
                ],
                'c' => [false, false, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);*/

        //OS
        $course = Course::Create([
            'name' => 'Операционные системы',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'os.jpg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Операционная система'];
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
            'name' => 'Классификация операционных систем',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Операционная система** составляет основу программного обеспечения ПК. Операционная система представляет комплекс системных и служебных программных средств, который обеспечивает взаимодействие пользователя с компьютером и выполнение всех других программ.

С одной стороны, она опирается на базовое программное обеспечение ПК, входящее в его систему BIOS, с другой стороны, она сама является опорой для программного обеспечения более высоких уровней – прикладных и большинства служебных приложений.

Для того чтобы компьютер мог работать, на его жестком диске должна быть установлена (записана) операционная система. При включении компьютера она считывается с дисковой памяти и размещается в ОЗУ. Этот процесс называется загрузкой операционной системы.

Операционные системы различаются особенностями реализации алгоритмов управления ресурсами компьютера, областями использования.

### Классификация операционных систем
1) По количеству одновременно работающих пользователей
   - **Однопользовательские** могут обслуживать только одного пользователя в один момент времени
   - **Многопользовательские** поддерживают одновременную работу на ЭВМ нескольких пользователей за различными терминалами, отличаются наличием средств защиты информации каждого пользователя от несанкционированного доступа других пользователей
2) По числу процессов, одновременно выполняемых под управлением системы
   - **Однозадачные** выполняют функцию предоставления пользователю виртуальной машины, делая более простым и удобным процесс взаимодействия пользователя с компьютером. Однозадачные ОС включают средства управления периферийными устройствами, средства управления файлами, средства общения с пользователем
   - **Многозадачные** в дополнение ко всем функциям однозадачных ОС, они также управляют разделением совместно используемых ресурсов, таких как процессор, оперативная память, файлы и внешние устройства
3) По количеству поддерживаемых процессоров
   - **Однопроцессорные** поддерживают режим распределения ресурсов только одного процессора
   - **Многопроцессорные** поддерживают режим распределения ресурсов нескольких процессоров для решения той или иной задачи
4) По разрядности кода ОС: 8-разрядные, 16-разрядные, 32-разрядные, 64-разрядные
5) По типу интерфейса
   - **Командные** с командным интерфейсом
   - **Графические** с графическим интерфейсом
6) По типу доступа пользователя к ЭВМ
   - **Пакетной обработки** в которых из программ, подлежащих выполнению, формируется пакет (набор) заданий, вводимых в ЭВМ и выполняемых в порядке очередности с возможным учетом приоритетности
   - **Разделения времени** обеспечивающих одновременный диалоговый (интерактивный) режим доступа к ЭВМ нескольких пользователей на разных терминалах, которым по очереди выделяются ресурсы машины, что координируется операционной системой в соответствии с заданной дисциплиной обслуживания
   - **Реального времени** обеспечивающих определенное гарантированное время ответа машины на запрос пользователя с управлением им какими-либо внешними но отношению к ЭВМ событиями, процессами или объектами
7) По типу использования ресурсов
   - **Сетевые** предназначены для управления ресурсами компьютеров, объединенных в сеть с целью совместного использования данных, и предоставляют мощные средства разграничения доступа к данным в рамках обеспечения их целостности и сохранности, а также множество сервисных возможностей по использованию сетевых ресурсов
   - **Локальные** могут использоваться на любом персональном компьютере, а также на отдельном компьютере, подключенном к сети в качестве рабочей станции или клиента
'
        ]);

        $questions = [
            [
                'q' => 'Какая система составлят основу программного обеспечения персонального компьютера?',
                't' => 'task',
                'a' => 'операционная'
            ],
            [
                'q' => 'Как называется процесс считывания операционной системы с дисковой памяти и ее размещения на жестком диске?',
                't' => 'task',
                'a' => 'загрузка'
            ],
            [
                'q' => 'Какие OS предназначены для управления ресурсами ПК, включенными в сеть',
                't' => 'task',
                'a' => 'сетевые'
            ],
            [
                'q' => 'Какие OS гарантируют время ответа машины на запрос пользователя?',
                't' => 'task',
                'a' => 'реального времени'
            ],
            [
                'q' => 'Какая программа обеспечивает возможность работы пользователя с консольной операционной системой?',
                't' => 'task',
                'a' => 'терминал'
            ],
            [
                'q' => 'Какие категории присутствуют в классификации операционных систем в зависимости от типа системы?',
                'a' => [
                    'Процессорной обработки',
                    'Пакетной обработки',
                    'Реального времени',
                    'Многозадачные',
                    'Сетевые',
                    'Процедурной обработки',
                    'Функциональной обработки',
                    'Разделения времени'
                ],
                'c' => [false, true, true, false, false, false, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Прерывания',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Прерывание** - процедура, которая позволяет изменить последовательность команд, выполняемых процессором.

**Прерывание** - сигнал, сообщающий процессору о наступлении какого-либо события.

Выполнение текущей последовательности команд приостанавливается и управление передается разработчику прерывания, который реагирует на событие и обслуживает его, после чего он возвращает управление в прерванный код. 

Когда ядро обрабытывает прерывание, оно запрещает другие прерывания и разрешает их снова только после завершения обработки текущего прерывания. 

При постоянном потоке прерываний может образоваться очередь прерываний, следовательно ядро должно быть образовано таким образом, чтобы оно определяло только тип прерывания, а затем передавало его на обработку соответствующей системной программе по работе только с этим типом прерываний, что не влечет создание больших очередей из прерываний в операционных системах.

**Параметры прерываний**
- Номер прерывания
- Вектор прерывания - адрес ячейки памяти, где хранится программа-обработчик прерывания

**Обработчик прерывания** - специальная процедура, вызываемая при прерывании, для выполнения его обработки.

**Типы прерываний**(IBM):
- SVC-прерывания - программные прерывания по вызову супервизора (их инициализирует работающий процесс, который выполняет команду вызова супервизора, такое прерывание помогает защитить ос от пользователей, которые должны запрашивать требуемыемые услуги при помощи команды)
- Прерывания ввода/вывода (инициализируется аппаратурой ввода/вывода, сигнализируют процессору о том, что произошло изменение устройства ввода/вывода)
- Внешние прерывания (происходят, например, по истечении кванта времени, заданного таймером прерываний или прием сигналов прерывания от другого процессора)
- Прерывания по рестарту (когда оператор нажимает кнопку рестарт или от другого процессора поступает команда перезапуска)
- Прерывания по контролю (ошибке) программы (например деление на 0, попытка процесса использоваь привелегированную команду или выйти за пределы своего адресного пространства)
- Прерывания по контролю (ошибке) машины (вызываются аппаратными ошибками)

Типы прерываний (в зависимости от источника возникновения сигнала):
- Асинхронные (аппаратные) - события, которые исходят от внешних источников (сигнал от таймера, сетевые карты, дисковые накопители, нажатие на клавишу клавиатуры, движение мыши)
   - Маскируемые - прерывния, которые можно запрещать установкой соответствующих битов в регистре маскирования прерываний
   - Немаскируемые - обрабытываются всегда, независимо от запретов на другие прерывания
- Синхронные (внутренние) - события в процессоре, как результат нарушения каких-либо условий при исполнении машинного кода (деление на 0, переполнение стека, обращение к недопустимым адресам памяти или недопустимый ход операции)
- Программные инициализируются выполнение специальной инструкции в коде программы (используются для обращения к функциям встроенного ПО)

**Приоретизация** - разделение всех источников прерываний на классы и назначение каждому классу своего уровня приоритета запроса на прерывание.

**Обслуживание прерываний**:
- Относительное - если во время обработки прерывания поступает более приоритетное прерывание, то это прерывание будет обрабатываться только после завершения обработки текущего прерывания.
- Абсолютное - если во время обработки прерывания поступает более приоритетное прерывание, то текущая процедура обработки прерывания вытесняется и процессор начинает выполнять обработку поступившего прерывания.
'
        ]);

        $questions = [
            [
                'q' => 'Прерывание это',
                't' => 'test_one',
                'a' => [
                    'Остановка работы программы из-за нехватки системных ресурсов',
                    'Процедура, позволяющая изменить последовательность команд, выполняемых процессором.',
                    'Сигнал о завершении выполнения процедуры',
                    'Остановка работы операционной системы'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Перечислите пераметры прерывания',
                'a' => [
                    'Вектор прерывания',
                    'Файл прерывания',
                    'Сигнал прерывания',
                    'Номер прерывания'
                ],
                'c' => [true, false, false, true]
            ],
            [
                'q' => 'Может ли ядро обрабатывать одновременно несколько прерываний?',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [false, true]
            ],
            [
                'q' => 'Обрабатывет ли ядро все прерывания самостоятельно?',
                't' => 'test_one',
                'a' => [
                    'Да',
                    'Нет'
                ],
                'c' => [false, true]
            ],
            [
                'q' => 'Прерывания, исходящие от внешних источников',
                't' => 'task',
                'a' => 'асинхронные;аппаратные;внешние'
            ],
            [
                'q' => 'Внешние прерывания, обрабатываемые всегда, независимо от запретов на другие прерывания',
                't' => 'task',
                'a' => 'немаскируемые'
            ],
            [
                'q' => 'К какому типу прерываний относится деление на 0?',
                't' => 'test_one',
                'a' => [
                    'Синхронные',
                    'Программные',
                    'Асинхронные'
                ],
                'c' => [true, false, false]
            ],
            [
                'q' => 'Что является вектором прерывания?',
                't' => 'test_one',
                'a' => [
                    'Массив с описанием прерывания',
                    'Начало и конец прерывания',
                    'Время происхождения прерывания',
                    'Адрес в памяти, где хранится программа-обработчик прерывания'
                ],
                'c' => [false, false, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Процессы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Процесс** - выполняющаяся программа, включающая текущие значения счетчиков команд, регистров и переменных.

В многозадачной системе процессор переключается между задачами, выделяя им по немногу времени, причем в каждый момент времени процессор может работать только с над одной задачей, но переключение между процессами происходит достаточно часто, чтобы у пользователя возникла иллюзия многозадачности. 

Процесс характеризует некотоую совокупность набора, исполняющихся команд, ассоциированных с ним ресурсов и текущего момента его выполнения, находящуюся под управлением операционной системы

**Основные компоненты процесса:**
- Исполняющийся программный код
- Данные, необходимые для выполнения программы
- Контекст процесса 
   - Уникальный номер процесса
   - Состояние регистров центрального процессора
   - Содержимое стека
   
Для управления процессами операционная система ведет список всех процессов, находящихся в системе. Этот список представляет собой таблицу, каждая запись которой содержит информацию по одному процессу.

**Организация процесса**
- Таблица процессов
- Блок управления процессом
- Образ процесса (область памяти, которая выделена процессу)

**Блок управления процессом**:
- Идентификаторы процесса
   - Номер процесса
   - Номер пользователя, запустившего процесс
- Состояние процессора
   - Регистры
   - Указатели стека
- Состояние процесса
   - Информация для планирования
   - Привелегии доступа к памяти
   - Доступные инструкции
   - Информация о виртуальной памяти, присвоенной процессу
   - Статистика и ограничения
   - Объекты для ввода и вывода информации процессом
   
У каждого процесса есть выделенная область памяти, нумерация этой области памяти для каждого процесса начинается с нуля.  Каждый процесс выполняется в собственном виртуальном пространстве. 

Виртуальное пространство процесса состоит из:
- Стек (используется для вызова функций и системных вызовов)
- Куча
- Сегмент данных 
   - Статические переменные, размер которых может быть определен на этапе компиляции программы
   - Динамические переменные, размер которых можно определить только в момент выполнения (место выделяется из кучи)
- Сегмент кода - место, в котором хранится исполняемый код программы

### Состояние процесса
- Запуск
   - Получене адресного пространства
   - выделение стека и системных ресурсов
   - установка начального значения программного счетчика поцесса
   - выполнение дополнительных операций
- Исполнение
- Готовность
- Ожидание
- Завершение

Всякий новый процесс, появляющийся в системе попадает в состояние готовность. ОС, используя какой-либо алгоритм планирования, переводит один из готовых процессов в состояние исполнениия, где происходит непосредственное выполнение программного кода процесса.

Причины выхода процесса из состояния исполнения:
- ОС прекращает его деятельность ($\to$ завершение)
- Процессу требуется какое-либо событие ($\to$ ожидание)
- Прерывание (например истек временной интервал для работы процесса) ($\to$ готовность)

Из состояния ожидания, после того как ожидаемое событие произошло, процесс переходит в состояние готовности, и тогда он снова может быть выбран для исполнения.

**Операции над процессами**:
- Создание процесса
- Завершение процесса
- Приостановка процесса (исполнение $\to$ готовность)
- Запуск процесса (готовность $\to$ исполнение)
- Блокирование процесса (исполнение $\to$ ожидание)
- Разблокирование процесса (ожидание $\to$ готовность)
- Изменение приоритета процесса

Операции создания и завершения процесса являются одноразовыми. Все остальные операции, как правило, являются многоразовыми.

**Создание процесса**
- fork - создает дубликат вызываемого процесса, после чего родительскому и дочернему процессу соответствуют одинаковые образы в памяти, строки окружения и одни и те же открытые файлы. Дочерний процесс обычно выполняет системный вызов exec для изменения своего образа памяти и запуска новой программы.

**Завершение процесса**:
- Плановое завершение (exit)
- Плановый выход по известной ошибке
- Выход по неисправимой ошибке
- Уничтожение другим процессом (kill)

**Переключение контекста** - процедура сохранения/восстанвления работоспособности процессов. (время, затраченное на эту операцию не используется вычислительной системой и представляет собой накладные расходы)
'
        ]);

        $questions = [
            [
                'q' => 'Основные компоненты процесса',
                'a' => [
                    'Связанные с ним процессы',
                    'Память процесса',
                    'Данные, необходимые для работы программы',
                    'Контекст процесса',
                    'Обработчик прерываний процесса',
                    'Ядро процесса',
                    'Программный код',
                    'Потоки'
                ],
                'c' => [false, false, true, true, false, false, true, false]
            ],
            [
                'q' => 'Область памяти, которая выделена процессу',
                't' => 'test_one',
                'a' => [
                    'Ядро процесса',
                    'Файл процесса',
                    'Образ процесса',
                    'Кластер процесса'
                ],
                'c' => [false, false, true, false]
            ],
            [
              'q' => 'Откуда выделяется место для хранения динамических переменных процесса?',
                't' => 'test_one',
                'a' => [
                    'Из стека',
                    'Из базы данных',
                    'Из кучи',
                    'Из файла'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Где хранится исполняемый код программы?',
                't' => 'test_one',
                'a' => [
                    'В сегменте кода' ,
                    'В сегменте данных',
                    'В стеке',
                    'В куче'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Что может привести к приостановке процесса?',
                'a' => [
                    'Критическая ошибка его выполнения' ,
                    'Уничтожение другим процессом',
                    'Запрос на ввод',
                    'Блокировка '
                ],
                'c' => [false, false, true, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

         $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Планирование процессов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Основная функция операционной системы - организация эффективного использования вычислительной системы. ОС должна управлять всеми ресурсами вычислительной машины так, чтобы обеспечить максимальную эффективность ее функционирования.

Управление ресурсами:
- Планирование ресурса
- Отслеживание состояния ресурса
- Разрешение конфликтов между потребителями ресурса

Виды планирования
- Планирование заданий (процедура выбора очередного задания для загрузки в машину, т.е. для порождения соответствующего процесса)
- Планирование использования процессора

Уровни планирования
- Долгосрочный (планирование заданий)
- Краткосрочный (планирование использования процессора)
- Среднесрочный (когда и какой процесс нужно перекачать на диск и обратно)
Планирование необходимо в следующих ситуациях:
1) При создании процесса.
2) При завершении процесса.
3) При блокировке процесса на операции ввода/вывода, семафоре и т.д.
4) При прерывании ввода/вывода.

**Алгоритм планирования без переключений (неприоритетный)** - не требует прерывание по аппаратному таймеру, процесс останавливается только когда блокируется или завершает работу.

**Алгоритм планирования с переключениями (приоритетный)** - требует прерывание по аппаратному таймеру, процесс работает только определенный период времени, после этого он останавливается по таймеру, чтобы передать управление планировщику.

#### Задачи алгоритмов планирования:

1. Для всех систем:
   * Справедливость - каждому процессу справедливую долю процессорного времени.
   * Контроль над выполнением принятой политики.
   * Баланс - поддержка занятости всех частей системы.
2. Системы пакетной обработки:
   - Пропускная способность - колличество задач в час.
   - Оборотное время - минимизация времени на ожидание обслуживания и обработку задач.
   - Использование процесса - чтобы процессор был всегда занят.
3. Интерактивные системы.
   - Время отклика - быстрая реакция на запросы.
   - Соразмерность - выполнение ожиданий пользователя.
4. Системы реального времени.
   - Окончание работы к сроку - предотвращение потери данных.
   - Предсказуемость - предотвращение деградации качества в мультимедийных системах

Требования к алгоритмам планирования
- Предсказуемость
- Минимизация накладных расходов
- Равномерная загрузка ресурсов вычислительной системы
- Масштабируемость
- Компромисс

Улучшая алгоритм по одному критерию мы ухудшаем его по другому.

Критерии планирования:
- Справедливость (гарантировать каждому заданию или процессу определенную часть времени использования процессора в компьютерной системе)
- Эффективность (постараться занять процессор на 100% рабочего времени, не позволяя ему простаивать в ожидании процессов, готовых к исполнению)
- Сокращение полного времени выполнения (обеспечить минимальное время между стартом процесса или постановкой задачи в очередь и его завершением)
- Сокращение времени ожидания (сократить время, которое проводят процессы в состоянии готовность и задания в очереди для загрузки)
- Сокращение времени отклика (минимизировать время, которое требуется процессу в интерактивных системах для ответа на запрос пользователя)

События, требующие перераспределения процессороного времени:
- Прерывания от таймера (Сигнализируют, что время отведенное активной задаче на выполнение закончилось. Планировщик переводит задачу в состояние готовности и выполняет перепланировку)
- Задача выполнила системный вызов
- Внешнее (аппаратное) прерывание
- Внутреннее прерывание
- Запрос приложений и пользователей на создание задачи
- Повышение приоритета задачи
'
        ]);

        $questions = [
            [
                'q' => 'В какое состояние переводится процесс при таймерном прерывании?',
                't' => 'test_one',
                'a' => [
                    'Ожидание' ,
                    'Готовность',
                    'Выполнение',
                    'Завершение'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Какая из очередей содержит процессы, которые ожидают только процессора?',
                't' => 'test_one',
                'a' => [
                    'Процессорные' ,
                    'Ожидающие',
                    'Готовые',
                    'Выполненные'
                ],
                'c' => [false, false, true, false]
            ],
            [
                'q' => 'Что является главной причиной смены состояния процессов',
                't' => 'test_one',
                'a' => [
                    'Прерывания' ,
                    'Нехватка памяти',
                    'Вызов функции',
                    'Выделение памяти'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Какое из прерываний требует перераспределения процессорного времени?',
                't' => 'test_one',
                'a' => [
                    'Выделение памяти под массив в теле программы' ,
                    'Запуск компьютера',
                    'Вывод сообщения программой',
                    'Аппаратное прерывание'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Должен ли планировщик выделять время процессору на отдых?',
                't' => 'test_one',
                'a' => [
                    'Да' ,
                    'Нет'
                ],
                'c' => [false, true]
            ],
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Потоки',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Поток** - независимый путь выполнения внутри процесса, разделяющий вместе с процессом общее адресное пространство, код и глобальные данные.

У каждого потока имеются собственные регистры, стек и механизмы ввода в том числе очередь скрытых сообщений.

В одном процессе может быть несколько потоков (многопоточность).

В отличие от различных процессов, которые могут быть инициализированы различными пользователями и преследовать несовместимые цели, один процесс всегда запущен одним пользователем, и потоки созданы таким образом, чтобы работать совместно, не мешая друг другу.

Элементы процесса, **общие** для потоков:
- Адресное пространство
- Глобальные переменные
- Открытые файлы
- Дочерние процессы
- Необработанные аварийные сигналы и их обработчики
- Информация об использовании ресурсов

Индивидуальные элементы потока:
- Счетчик команд
- Регистры
- Стек
- Состояние

Характеризация потоков
- Создаются в контексте процесса
- Выполняют один и тот же код
- Манипулируют одними и теми же данными
- Совместно используют описатели объектов ядра
- Используют меньше ресурсов системы, чем процессы

Достоинства многопоточности
- Структура приложения расчитана на одновременное исполнение нескольких подзадач
- Приносит пользу при наличии нескольких задач, работающих (хотя бы частично) одновременно
- Код выглядит просто

Недостатки многопоточности
- Приложение сложно написать и отладить
- Необходима синхронизация доступа к совместным ресурсам
- Координация выполнения взаимозависимого кода

Причины появления потоков
- Параллелизм
   - Один код
   - Доступ к одним данным
   - Один уровень доступа
- Разные текущие команды
- Разные значения счетчиков
- Разное множество регистров ЦП
- Одновременность


Поток - отдельный объект ОС, который привязан к процессу. После создания и инициалтизации поток переходит в состояние готовности, занимая в своей группе приоритетности место в конце очереди.
 
Планировщик операционной системы в соответствии с описанной стратегией выбирает поток, переводя его в состояние выполнения.

По истечении отведенного кванта времени поток возвращается в состояние готовности, становясь в хвост очереди в своей группе приоритетности. Но поток может перейти из состояния выполнение в другое состояния и до завершения, отведенного кванта времени: В готовность - если появляется поток с большим приоритетом, в завершение - если поток закончил свою работу (фрагмент кода)

В состояние ожидания поток может перейти, если его дальнейшее выполнение возможно только после наступления некоторого события. Из ожидания поток может перейти в готовность, если наступило событие, ожидаемое потоком.

Так как весь процесс вычислений на компьютере управляется событиями, каждый поток во время своего выполнения многократно прерывается, уступая свое место другому потоку.

События, приводящие к приостановке потока
- Асинхронные 
   - прерывание может произойти в любой момент выполнения потока
- Синхронные
   - Исключение связано с тем что по каким-то причинам выполнение потока становится невозможным.
   
Управление потоками
- В режиме ядра
- На уровне пользователя
   - В 10-100 раз быстрее, чем в режиме ядра
   
Создание и синхронизация потоков выполняется без участия ядра
Создание потока 2,5 раза быстрее создания процесса
Создание потока на уровне пользователя в 20 раз быстрее создания потока на уровне ядра

**Пул потоков** - коллекция потоков, которые могут использоваться для выполнения нескольких задач в фоновом режиме. 
- Позволяет разгрузить главный поток
- Пулы потоков часто используются в серверных приложениях'
        ]);

        $questions = [
            [
                'q' => 'Индивидуальные элементы потока',
                'a' => [
                    'Стек' ,
                    'Адресное пространство',
                    'Глобальные переменные',
                    'Счетчик команд',
                    'Открытые файлы',
                    'Состояние',
                    'Регистры'
                ],
                'c' => [true, false, false, true, false, true, true]
            ],
            [
                'q' => 'Выберите верные утверждения',
                'a' => [
                    'Каждый поток имеет собственное адресное пространство' ,
                    'В одном потоке может быть несколько процессов',
                    'Поток может выполняться вне процесса',
                    'В одном процессе может быть несколько потоков',
                    'Потоки используют меньше ресурсов системы, чем процессы',
                    'Потоки работают с одними и теми же данными',
                    'Потоки совместно используют описатели объектов ядра'
                ],
                'c' => [false, false, false, true, true, true, true]
            ],
            [
                'q' => 'Является ли вызов фунцции в приложении отдельным потоком?',
                't' => 'test_one',
                'a' => [
                    'Да, если она является рекурсивной' ,
                    'Да, если в ней выполняется опрация ввода',
                    'Да',
                    'Нет'
                ],
                'c' => [false, false, false, true]
            ],
            [
                'q' => 'Какие потоки работают быстрее',
                't' => 'test_one',
                'a' => [
                    'Реализованные на уровне приложения' ,
                    'Реализованные на уровне ядра',
                    'Скорость потоков нельзя сравнить',
                    'Все виды потоков работают одинаково по скорости'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Какие операции не могут выполняться двумя потокам одновременно?',
                'a' => [
                    'Перерисовка экрана в процессе вычисления' ,
                    'Вывод двух строк на экран',
                    'Обработка массива данных с разделением его на части',
                    'Изменеие глобальной переменной'
                ],
                'c' => [false, true, false, true]
            ],
            [
                'q' => 'Как называется коллекция потоков, которые могут использоваться для выполнения нескольких задач в фоновом режиме',
                't' => 'task',
                'a' => 'пулл;пуллпотоков;потоковыйпулл'
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Синхронизация процессов',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'В операционных системах процессы, работающие совместно, могут сообща использовать некое общее хранилище данных. Каждый процесс может считывать из общего хранилища данных и записывать туда информацию. Таким участком может быть участок разделяемой памяти или файл общего доступа.

**Взаимоисключение** - ситуация, в которой два и более процесса считывают или записывают данные одновременно и конечный результат зависит от того, какой из них был первым.

Некоторый промежуток времени процесс занят внутренними расчетами и другими задачами, не приводящими к состоянию состязания. В другие моменты времени процесс обращается к совместно используемым данным, называемым **критической областью**.  Если удается избежать одновременного нахождения в критических областях, мы сможем избежать состязаний.

Условия правильного использования общих данных:
- Два процесса не должны одновременно находиться в критически областях
- В программе не должно быть предположений о скорости или колличестве процессов
- Процесс, находящийся вне критической области не может блокировать другие процессы
- Невозможна ситуация, когда процесс вечно ждет попадения в критическую область

Механизмы синхронизации
- Программно-аппаратная форма реализации
- Основаны на использовании специальных переменных

**Низкоуровневые средства синхронизации** - средства, имеющие машинно-ориентрованный характер и требующие от пользователей специальных программ для решения какой-либо задачи синхронизации.

**Высокоуровневые средства синхронизации** - средства, реализованные в виде программной системы, назначением которой является решение конкретной задачи синхронизации

Способы синхронизации процессов (обеспечения взаимного исключения)
- Использование блокирующих переменных - запрет одновременного исполнения двух или более команд, которые обращаются к одной и той же ячейке памяти.
- Запрещение прерываний - запрет всех прерываний при входе процесса в критическую область и разрешение прерываний при выходе из области.
- Строгое чередование - переменная состояния отслеживает, чья очередь входить в критическую область (процессы могут как читать так и изменять эту переменную и она может стать сама критическим ресурсом)

Решение проблемы взаимного исключения
1) Выполнение вспомогаельного критического интервала
2) Проверка значения переменной состояния
3) Изменение значения переменной состояния (занято)
4) Переход процесса в основной критический интервал
5) Выполнение вспомогательного критического интервала
6) Изменение значения переменной состояния (не занято)

Способы синхронизации процессов:
- Сигналы
- Семафоры и мьютексы
- Монитор

**Семафор** - объект, ограничивающий колличество потоков, которые могут войти в заданный участок кода

Операции:
- down 
   - Сравнивает значение семафора с 0
   - Если оно больше нуля, то уменьшает значение семафора и передает управление процессу
   - Если же оно меньше нуля переводит процесс в состояние ожидания
   - После начала операции ни один процесс не получит доступа к семафору до окончания или блокировки операции
   - неделима
- up 
   - Увеличивает значение семафора
   - Умененьшает число ожидающих процессов в случае, если хотя бы один из связанных с семафором процессов не может завершить более раннюю операцию down (один из них выбирается системой и ему разрешается завершить свою операцию)
   - Неделима
   - Процесс не может быть блокирован во время операции

Атомарность операции down очень важна для разрешения проблемы синхронизации и предотвращения состояния состязания. 

После операции up, примененной к семафору, связанному с несколькими ожидающими процессами, значение семафора так и остается равным 0, но число ожидающих процессов уменьшится на 1.

POSIX вызовы операций с семафорами:
- sem_init()
- sem_wait()
- sem_post()

**Мьютекс** - аналог одноместного семафора, служащий в программировании для синхронизации одновременно выполняющихся потоков. (упрощенная версия семафора)

Мьютекс может находиться в одном из двух состояний:
- Блокированое
- Не блокированное

POSIX вызовы операций с мьютексами:
- mutex_init()
- mutex_lock()
- mutex_destroy()

Монитор - высокоуровневый механизм взаимодействия и синхронизации процессов, обеспечивающий доступ к неразделяемым ресурсам.

Монитор является многовходовым модулем особого рода. Он содержит описания общих для нескольких параллельных процессов данных  и операций над этими данными в виде процедур $P_1...P_n$

Пользователи монитора - параллельные процессы, имеющие доступ к описанным в мониторе общим данным только через операции.

В каждый момент времени не более чем один процесс может выполнять какую-либо операцию монитора.

Для реализации ожидания внутри монитора по различным уровням, вводятся условные переменные - переменные с описанием вида condition, доступ к которым возможен только операциями wait и signal. Операция  wait означает, что выполнивший ее процесс задерживается до того момента, пока другой процесс не выполнит операцию signal. Операция signal возобновляет ровно один приостановленный процесс, а если таковых нет, то не выполняет никаких действий.

Монитор состоит из:
- набора процедур, взаимодействующих с общим ресурсом
- мьютекса
- переменных, связанных с этим ресурсом
- инварианта, который определяет условия, позволяющие избежать состояния гонки

Примеры параллельных задач:
- Веб-сервер - должен обслуживать несколько запросов параллельно
- Веб-браузер - должен загружать данные из различных источников для ускорения в момент обращения к странице
- Некая вычислительная программа - должна производить обработку большого массива данных'
        ]);

        $questions = [
            [
                'q' => 'Укажите условия правильного использования общих данных',
                'a' => [
                    'В программе должно быть известно точное колличество процессов' ,
                    'Процесс, который не находится в критической области может блокировать другие процессы',
                    'Два процесса не должны одновременно находиться в критической области',
                    'Нельзя допускать того, чтобы процесс вечно ждал попадения в критическую область'
                ],
                'c' => [false, false, true, true]
            ],
            [
                'q' => 'К прграммным реализациям взаимоисключений относятся',
                'a' => [
                    'Мьютексы',
                    'Семафоры',
                    'Ожидание',
                    'Флаги',
                    'Блокировка',
                    'Ускорители',
                    'Файлы',
                    'Мониторы'
                ],
                'c' => [true, true, false, true, false, false, false, true]
            ],
            [
                'q' => 'Укажите сверные утвержения об операции семафора down',
                'a' => [
                    'Сравнивает значение семафора с 0',
                    'Сравнивает значение семафора с 1',
                    'Не может быть прервана',
                    'Увеличивает значение семафора',
                    'При каждом вызове уменьшает значение семафора',
                    'Может перевести процесс в состояние ожидания',
                    'Может перевести процесс в состояние завершения',
                ],
                'c' => [true, false, true, false, false, true, false]
            ],
            [
                'q' => 'Высокоуровневый механизм взаимодействия и синхронизации процессов, который обеспечивает доступ к неразделяемым ресурсам',
                't' => 'test_one',
                'a' => [
                    'Сигнал',
                    'Монитор',
                    'Семафор',
                    'Планировщик',
                    'Поток'
                ],
                'c' => [false, true, false, false, false]
            ],
            [
                'q' => 'Какой их перечисленных примеров может быть реализован в виде задач параллельной обработки?',
                't' => 'test_one',
                'a' => [
                    'Поиск простых чисел',
                    'Дефрагментация информации',
                    'Подсчет контрольных сумм',
                    'Расчет сложной формулы, состоящей из большого числа операндов'
                ],
                'c' => [true, false, false, false]
            ],
            [
                'q' => 'Что из перечисленного входит в состав монитора?',
                'a' => [
                    'Экран',
                    'Мьютекс',
                    'Семафор',
                    'Переменные, связанные с разделяемым ресурсом',
                    'Процедуры, связанные с разделяемым ресурсом',
                    'Видеокарта',
                    'Ускоритель'
                ],
                'c' => [false, true, false, true, true, false, false]
            ],
            [
                'q' => 'Какое максимальное колличество процессов может одновременно выполнять какую-либо операцию монитора?',
                't' => 'task',
                'a' => '1'
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Файловая система',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**Файловая система** - это часть операционной системы, назначение которой состоит в том, чтобы обеспечить пользователю удобный интерфейс при работе с данными, хранящимися на диске, и обеспечить совместное использование файлов несколькими пользователями и процессами.

В широком смысле понятие "файловая система" включает:
- совокупность всех файлов на диске,
- наборы структур данных, используемых для управления файлами (каталоги файлов, дескрипторы файлов, таблицы распределения свободного и занятого пространства на диске и другие)
- комплекс системных программных средств, реализующих управление файлами, в частности: создание, уничтожение, чтение, запись, именование, поиск и другие операции над файлами.

#### Функции файловой системы:
- размещение и упорядочивание на носителе данных в виде файлов;
- определение максимально поддерживаемого объема данных на носителе информации;
- создание, чтение и удаление файлов;
- назначение и изменение атрибутов файлов (размер, время создания и изменения, владелец и создатель файла, доступен только для чтения, скрытый файл, временный файл, архивный, исполняемый, максимальная длина имени файла и т.п.);
- определение структуры файла;
- поиск файлов;
- организация каталогов для логической организации файлов;
- защита файлов при системном сбое;
- защита файлов от несанкционированного доступа и изменения их содержимого.

#### Организация информации в файловой системе.

Информация, записываемая на жесткий диск или любой другой носитель, размещается в нем на основе кластерной организации. Кластер представляют собой своего рода ячейку определенного размера, в которую помещается весь файл или его часть.

Если файл имеет размер кластера, то он занимает только один кластер. Если размер файла превышает размер ячейки, то он размещается в нескольких ячейках-кластерах. Причем свободные кластеры могут находиться не рядом с другом, а быть разбросанными по физической поверхности диска. Такая система позволяет наиболее рационально использовать место при хранении файлов. Задача файловой системы  — разложить файл при записи по свободным кластерам оптимальным образом, а также собрать его при чтении и выдать программе или операционной системе.

#### Виды файловых систем:
- NTFS
- FAT32
- Ext3
- Ext4
- NFS+
- UDF
- ISO9660

#### Файловые системы NTFS и FAT32
NTFS и FAT32 - наиболее популярные файловые системы.

Сейчас FAT32 активно вытесняется более продвинутой системой NTFS по причине ее большей надежности к сохранности и защите данных. К тому же последние версии ОС Windows просто не дадут себя установить, если раздел жесткого диска будет отформатирован в FAT32. Программа установки потребует отформатировать раздел в NTFS.

Файловая система NTFS поддерживает работу с дисками объемом в сотни терабайт и размером одного файла до 16 терабайт.

Файловая система FAT32 поддерживает диски до 8 терабайт и размер одного файла до 4Гб. Чаще всего данную ФС используют на флешках и картах памяти. Именно в FAT32 форматируют внешние накопители на заводе.
',

        ]);

        $questions = [
            [
                'q' => 'Часть ОС, обеспечивающая пользователя удобным интерфейсом при работе с данными, хранящимися на диске',
                't' => 'test_one',
                'a' => [
                    'Дисковая система',
                    'Файловая система',
                    'Ядро'
                ],
                'c' => [false, true, false]
            ],
            [
                'q' => 'Функци файловой системы',
                't' => 'test_one',
                'a' => [
                    'Назначение и изменение атрибутов файлов',
                    'Защита файлов от несанкционированного доступа',
                    'Поиск файлов',
                    'Выделение места на диске для файлов',
                    'Размещенение и упорядочивание на носителе данных в виде файлов'
                ],
                'c' => [true, true, true, false, true]
            ],
            [
                'q' => 'Что включает в себя понятие файловой системы?',
                'a' => [
                    'RAID',
                    'Совокупность всех файлов на диске',
                    'Совокупность всех дисков, а также файлов на них',
                    'Программные средства по управлению файлами',
                    'Структуры данных, используемые для управления файлами',
                    'Структуры данных, используемые для управления процессами, работающими с фалами',
                ],
                'c' => [false, true, false, true, true, false]
            ],
            [
                'q' => 'Ячейка памяти определенного размера, в которую помещается файл или его часть',
                't' => 'test_one',
                'a' => [
                    'Диск',
                    'Кластер',
                    'Окно',
                    'Файл',
                    'Ссылка'
                ],
                'c' => [false, true, false, false, false,]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Файлы',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '#### Файлы

**Файл** - определённый объем структурированной информации, объединенной общим смыслом и собранной в одной оболочке.

**Свойства файла:**
- имя
- расширение
- размер
- время (создания, последнего изменения, последнего доступа)
- права доступа
- атрибуты - Дополнительные метки, указывающие на определенные особенности данного файла
   - Только чтение — файл запрещено изменять
   - Скрытый — не отображается в Проводнике, если в настройках не указано отображать скрытые файлы
   - Системный — критический для работы операционной системы
   - Архивный — был изменен после резервного копирования или не был скопирован программой резервного копирования
   
**Ссылки** – дополнительные записи каталога, позволяющие обращаться к файлам или директориям по нескольким именам. 

### Мягкие (символические) ссылки
Мягкая ссылка это запись каталога, указывающая на имя объекта с другим inode. Мягкие ссылки содержат адрес нужного файла в файловой системе. При попытке открыть такую ссылку открывается целевой файл или папка. Главное ее отличие от жестких ссылок в том, что при удалении целевого файла ссылка останется, но она будет указывать в никуда, поскольку файла на самом деле больше нет.

**Особенности:**
- Могут ссылаться на файлы и каталоги;
- После удаления, перемещения или переименования файла становятся недействительными;
- Права доступа и номер inode отличаются от исходного файла;
- При изменении прав доступа для исходного файла, права на ссылку останутся неизменными;
- Можно ссылаться на другие разделы диска;
- Содержат только имя файла, а не его содержимое.

### Жесткие ссылки
Жесткая ссылка это запись каталога, указывающая на дескриптор inode. Этот тип ссылок реализован на более низком уровне файловой системы. Файл размещен только в определенном месте жесткого диска. Но на это место могут ссылаться несколько ссылок из файловой системы. Каждая из ссылок — это отдельный файл, но ведут они к одному участку жесткого диска. Файл можно перемещать между каталогами, и все ссылки останутся рабочими, поскольку для них неважно имя.

**Особенности:**
- Работают только в пределах одной файловой системы;
- Нельзя ссылаться на каталоги;
- Имеют ту же информацию inode и набор разрешений что и у исходного файла;
- Разрешения на ссылку изменяются при изменении разрешений файла;
- Можно перемещать, переименовывать, удалять файл, не повреждая ссылку',

        ]);

        $questions = [
            [
                'q' => 'Тип ссылок на файлы, которые не могут ссылаться на каталоги',
                't' => 'task',
                'a' => 'жесткие;жёсткие'
            ],
            [
                'q' => 'Выберите верные утверждения',
                'a' => [
                    'Символические ссылки работают только в пределах одной файловой системы',
                    'Жесткие ссылки работают только в пределах одной файловой системы',
                    'При изменении прав доступа для исходного файла, права на любую ссылку останутся неизменными',
                    'После удаления файла, удаляются все символические ссылки на него',
                    'Мягкие ссылки могут ссылаться на другие разделы диска'
                ],
                'c' => [false, true, false, false, true]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Массивы дисков',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => '**RAID** — это дисковый массив из нескольких устройств, - жестких дисков. Служит для повышения надёжности хранения данных и/или для повышения скорости чтения/записи информации (или и то и другое).

Связка из дисков занимается либо ускорением работы либо повышением безопасности данных в зависимости от выбора текущей конфигурации рейда(ов). Разные типы этих конфигураций отмечаются разными номерами: 1, 2, 3, 4 и выполняют разные функции.

Рейды ощутимо удобнее и эффективнее использования одного диска в системе.

Например, в случае построения 0-вой версии получается ощутимый прирост производительности. А жесткий диск сегодня есть узкий канал в быстродействии системы. Жесткие диски сегодня растут только в объеме. Их скорость оборота головки давно замерла на отметке в 7200, кэш тоже не то чтобы растет, архитектура остается почти прежней.

Физически RAID-массив представляет собой от двух до n-го количества жестких дисков подключенных к материнской плате поддерживающей возможность создания RAID (или к соответствующему контроллеру, что реже (контроллеры обычно используются на серверах в силу повышенной надежности и производительности)).

После создания рейда в системе ничего особого не появляется. Вся разница в работе с рейдом заключается только в небольшой настройке в биосе, которая организует рейд и в использовании драйвера.

RAID массивов существует несколько видов:

- RAID 0: дисковый массив для увеличения скорости\записи.
- RAID 1: зеркальный дисковый массив.
- RAID 2: матрица с поразрядным расслоением
- RAID 3: аппаратное обнаружение ошибок и четность
- RAID 4: внутригрупповой параллелизм
- RAID 5: четность вращения для распараллеливания записей
- RAID 6: Двумерная четность для обеспечения большей надежности

RAID 0 («Striping») — используется от двух до четырех жестких дисков, которые совместно обрабатывают информацию, что повышает производительность. Информация на рейде такого типа, разбивается на блоки данных и записывается на несколько дисков поочередно.

Один блок данных на один диск, другой блок данных на другой и тд. Таким образом существенно повышается производительность (от количества дисков зависит кратность увеличения производительности, т.е 4 диска будут бегать шустрее чем два), но страдает безопасность данных на всём массиве. При выходе из строя любого из входящих в такой RAID винчестеров (т.е. жестких дисков) практически полностью и безвозвратно пропадает вся информация.

Почему? Дело в том, что каждый файл состоит из некоторого количества байт.. каждый из которых несет в себе информацию. Но в RAID 0 массиве байты одного файла могут быть расположены на нескольких дисках. Соответственно при "смерти" одного из дисков потеряется произвольное количество байтов файла и восстановить его будет просто невозможно. Но файл то не один.

При использовании такого рейд-массива рекомендуется делать постоянные бэкапы ценной информации на внешний носитель.

RAID 1 (Mirroring — «зеркало») В отличии от RAID 0 получается, что Вы как бы "теряете" объем второго жесткого диска (он используется для записи на него полной (байт в байт) копии первого жесткого диска в то время как RAID 0 это место полностью доступно).

Преимущество же, как Вы уже поняли, в том, что он имеет высокую надежность, т.е все работает (и все данные существуют в природе, а не исчезают с выходом из строя одного из устройств) до тех пор пока функционирует хотя бы один диск, т.е. если даже грубо вывести из строя один диск - Вы не потеряете ни байта информации, т.к. второй является чистой копией первого и заменяет его при выходе из строя. Такой рейд частенько используется в серверах в силу безумнейшей жизнеспособности данных, что важно.

Производительность обеспечивается даже меньше чем при использовании одного диска без рейдов. 

RAID 2 зарезервирован для массивов, которые применяют код Хемминга. Принцип работы примерно такой: данные записываются на соответствующие устройства так же, как и в RAID 0, т.е они разбиваются на небольшие блоки по всем дискам, которые участвуют в хранении информации.

Оставшиеся же  (специально выделенные под оное) диски хранят коды коррекции ошибок, по которым в случае выхода какого-либо винчестера из строя возможно восстановление информации. Тобишь в массивах такого типа диски делятся на две группы — для данных и для кодов коррекции ошибок

Например, у Вас два диска являют собой место под систему и файлы, а еще два будут полностью отведены под данные коррекции на случай выхода из строя первых двух дисков. По сути это что-то вроде нулевого рейда, только с возможностью хоть как-то спасти информацию в случае сбоев одного из винчестеров. Редкостно затратно, - четыре диска вместо двух с весьма спорным приростом безопасности.',

        ]);

        $questions = [
            [
                'q' => 'Что такое RAID двумя словами?',
                't' => 'task',
                'a' => 'дисковоймассив;дисковыймассив'
            ],
            [
                'q' => 'Для чего нужен RAID-массив?',
                'a' => [
                    'Уменьшения расходов',
                    'Повышения производительности',
                    'Повышения избыточности',
                    'Уменьшение избыточности'
                ],
                'c' => [false, true, true, false]
            ],
            [
                'q' => 'Что значит зеркалирование?',
                't' => 'test_one',
                'a' => [
                    'Отражение дисков',
                    'Автоматическо копирование информации с одного диска на другой',
                    'Повышения избыточности',
                    'Параллельное чтение данных с нескольких дисков'
                ],
                'c' => [false, true, false, false]
            ],
            [
                'q' => 'Выберите верные утверждения о RAID0',
                't' => 'test_one',
                'a' => [
                    'Повышенная производительность',
                    'Каждый второй диск полностью копирует содержимое первого',
                    'Повышенная избыточность',
                    'Может содержать не менее 4 дисков',
                    'Может содержать не менее 2 дисков'
                ],
                'c' => [true, false, false, false, true]
            ],
            [
                'q' => 'Выберите верные утверждения о RAID1',
                't' => 'test_one',
                'a' => [
                    'Повышенная производительность',
                    'Каждый второй диск полностью копирует содержимое первого',
                    'Повышенная избыточность',
                    'Может содержать не менее 4 дисков',
                    'Может содержать не менее 2 дисков'
                ],
                'c' => [false, true, true, false, true]
            ],
            [
                'q' => 'Выберите верные утверждения о RAID3',
                't' => 'test_one',
                'a' => [
                    'Содержит 1 диск четности',
                    'Содержит не менее одного диска четности',
                    'Большая скорость чтения',
                    'Использует две контрольные суммы, вычисленные разными способами'
                ],
                'c' => [true, false, true, false]
            ]
        ];
        $this->create_questions($lesson, $questions);

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Виртуализация аппаратной части',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => 'Технологии виртуализации позволяют запускать на одном физическом компьютере (хосте) несколько виртуальных экземпляров операционных систем (гостевых ОС) в целях обеспечения их независимости от аппаратной платформы и сосредоточения нескольких виртуальных машин на одной физической. Виртуализация предоставляет множество преимуществ, как для инфраструктуры предприятий, так и для конечных пользователей. За счет виртуализации обеспечивается существенная экономия на аппаратном обеспечении, обслуживании, повышается гибкость ИТ-инфраструктуры, упрощается процедура резервного копирования и восстановления после сбоев. Виртуальные машины, являясь независимыми от конкретного оборудования единицами, могут распространяться в качестве предустановленных шаблонов, которые могут быть запущены на любой аппаратной платформе поддерживаемой архитектуры.

До недавнего времени усилия в области виртуализации операционных систем были сосредоточены в основном в области программных разработок. В 1998 году компания VMware впервые серьезно обозначила перспективы развития виртуальных систем, запатентовав программные техники виртуализации. Благодаря усилиям VMware, а также других производителей виртуальных платформ, и возрастающим темпам совершенствования компьютерной техники, корпоративные и домашние пользователи увидели преимущества и перспективы новой технологии, а рынок средств виртуализации начал расти стремительными темпами. Безусловно, такие крупные компании, как Intel и AMD, контролирующие большую часть рынка процессоров, не могли оставить эту перспективную технологию без внимания. Компания Intel первая увидела в новой технологии источник получения технологического превосходства над конкурентами и начала работу над усовершенствованием x86 архитектуры процессоров в целях поддержки платформ виртуализации. Вслед за Intel компания AMD также присоединилась к разработкам в отношении поддержки аппаратной виртуализации в процессорах, чтобы не потерять позиции на рынке. В данный момент обе компании предлагают модели процессоров, обладающих расширенным набором инструкций и позволяющих напрямую использовать ресурсы аппаратуры в виртуальных машинах.

#### Развитие аппаратных техник виртуализации

Идея аппаратной виртуализации не нова: впервые она была воплощена в 386-х процессорах и носила название V86 mode. Этот режим работы 8086-го процессора позволял запускать параллельно несколько DOS-приложений. Теперь аппаратная виртуализация позволяет запускать несколько независимых виртуальных машин в соответствующих разделах аппаратного пространства компьютера. Аппаратная виртуализация является логическим продолжением эволюции уровней абстрагирования программных платформ — от многозадачности до уровня виртуализации:

- **Многозадачность** является первым уровнем абстракции приложений. Каждое приложение разделяет ресурсы физического процессора в режиме разделения исполнения кода по времени.

- Технология **HyperThreading** в широком смысле также представляет собой аппаратную технологию виртуализации, поскольку при ее использовании в рамках одного физического процессора происходит симуляция двух виртуальных процессоров в рамках одного физического с помощью техники Symmetric Multi Processing (SMP).

- **Виртуализация** представляет собой эмуляцию нескольких виртуальных процессоров для каждой из гостевых операционных систем. При этом технология виртуального SMP позволяет представлять несколько виртуальных процессоров в гостевой ОС при наличии технологии HyperThreading или нескольких ядер в физическом процессоре.

#### Преимущества аппаратной виртуализации над программной:
- Упрощение разработки платформ виртуализации за счет предоставления аппаратных интерфейсов управления и поддержки виртуальных гостевых систем. Это способствует появлению и развитию новых платформ виртуализации и средств управления, в связи с уменьшением трудоемкости и времени их разработки.
- Возможность увеличения быстродействия платформ виртуализации. Поскольку управление виртуальными гостевыми системами производится с помощью небольшого промежуточного слоя программного обеспечения (гипервизора) напрямую, в перспективе ожидается увеличение быстродействия платформ виртуализации на основе аппаратных техник.
- Возможность независимого запуска нескольких виртуальных платформ с возможностью переключения между ними на аппаратном уровне. Несколько виртуальных машин могут работать независимо, каждая в своем пространстве аппаратных ресурсов, что позволит устранить потери быстродействия на поддержание хостовой платформы, а также увеличить защищенность виртуальных машин за счет их полной изоляции.
- Отвязывание гостевой системы от архитектуры хостовой платформы и реализации платформы виртуализации. С помощью технологий аппаратной виртуализации возможен запуск 64-битных гостевых систем из 32-битных хостовых системах, с запущенными в них 32-битными средами виртуализации.

#### Как работает аппаратная виртуализация

Необходимость поддержки аппаратной виртуализации заставила производителей процессоров несколько изменить их архитектуру за счет введения дополнительных инструкций для предоставления прямого доступа к ресурсам процессора из гостевых систем. Этот набор дополнительных инструкций носит название Virtual Machine Extensions (VMX). VMX предоставляет следующие инструкции: VMPTRLD, VMPTRST, VMCLEAR, VMREAD, VMREAD, VMWRITE, VMCALL, VMLAUNCH, VMRESUME, VMXON и VMXOFF.

Процессор с поддержкой виртуализации может работать в двух режимах root operation и non-root operation. В режиме root operation работает специальное программное обеспечение, являющееся «легковесной» прослойкой между гостевыми операционными системами и оборудованием — монитор виртуальных машин (Virtual Machine Monitor, VMM), носящий также название гипервизор (hypervisor). Слово «гипервизор» появилось интересным образом: когда-то очень давно, операционная система носила название «supervisor», а программное обеспечение, находящееся «под супервизором», получило название «гипервизор».

Чтобы перевести процессор в режим виртуализации, платформа виртуализации должна вызвать инструкцию VMXON и передать управление гипервизору, который запускает виртуальную гостевую систему инструкцией VMLAUNCH и VMRESUME (точки входа в виртуальную машину). Virtual Machine Monitor может выйти из режима виртуализации процессора, вызвав инструкцию VMXOFF.

#### Процедура запуска виртуальных машин

Каждая из гостевых операционных систем запускается и работает независимо от других и является изолированной с точки зрения аппаратных ресурсов и безопасности.

#### Отличие аппаратной виртуализации от программной

Классическая архитектура программной виртуализации подразумевает наличие хостовой операционной системы, поверх которой запускается платформа виртуализации, эмулирующая работу аппаратных компонентов и управляющая аппаратными ресурсами в отношении гостевой операционной системы. Реализация такой платформы достаточно сложна и трудоемка, присутствуют потери производительности, в связи с тем, что виртуализация производится поверх хостовой системы. Безопасность виртуальных машин также находится под угрозой, поскольку получение контроля на хостовой операционной системой автоматически означает получение контроля над всеми гостевыми системами.

В отличие от программной техники, с помощью аппаратной виртуализации возможно получение изолированных гостевых систем, управляемых гипервизором напрямую. Такой подход может обеспечить простоту реализации платформы виртуализации и увеличить надежность платформы с несколькими одновременно запущенными гостевыми системами, при этом нет потерь производительности на обслуживание хостовой системы. Такая модель позволит приблизить производительность гостевых систем к реальным и сократить затраты производительности на поддержание хостовой платформы.

#### Технологии виртуализации компаний Intel и AMD

Компании Intel и AMD, являясь ведущими производителями процессоров для серверных и настольных платформ, разработали техники аппаратной виртуализации для их использования в платформах виртуализации. Эти техники не обладают прямой совместимостью, но выполняют в основном схожие функции. Обе они предполагают наличие гипервизора, управляющего не модифицированными гостевыми системами, и имеют возможности для разработки платформ виртуализации без необходимости эмуляции аппаратуры. В процессорах обеих компаний, поддерживающих виртуализацию, введены дополнительные инструкции для их вызова гипервизором в целях управления виртуальными системами. В данный момент группа, занимающаяся исследованием возможностей аппаратных техник виртуализации, включает в себя компании AMD, Intel, Dell, Fujitsu Siemens, Hewlett-Packard, IBM, Sun Microsystems и VMware.

#### Виртуализация Intel
Компания Intel официально объявила о запуске технологии виртуализации в начале 2005 года на конференции Intel Developer Forum Spring 2005. Новая технология получила кодовое название Vanderpool и официальное Intel Virtualization Technology (сокращенно Intel VT). Технология Intel VT содержит в себе некоторое множество техник различного класса, имеющих номера версий VT-x, где x — литер, указывающий на подвид аппаратной техники. Была заявлена поддержка новой технологии в процессорах Pentium 4, Pentium D, Xeon, Core Duo и Core 2 Duo. Intel также опубликовала спецификации на Intel VT для Itanium-based процессоров, где технология виртуализации фигурировала под кодовым именем «Silvervale» и версией VT-i. Однако, начиная с 2005 года, новые модели процессоров Itanium не поддерживают x86 инструкции аппаратно, и x86-виртуализация может быть использована на архитектуре IA-64 только с помощью эмуляции.

Для включения технологии Intel VT в компьютерные системы, компания Intel сотрудничала с производителями материнских плат, BIOS и периферийного оборудования, чтобы обеспечить совместимость Intel VT с существующими системами. Во многих компьютерных системах технология аппаратной виртуализации может быть выключена в BIOS. Спецификации на Intel VT говорят, что для поддержки этой технологии не достаточно одного лишь поддерживающего ее процессора, необходимо также наличие соответствующих чипсетов материнской платы, BIOS и программного обеспечения, использующего Intel VT.

#### Виртуализация AMD
Компания AMD, так же, как и компания Intel, не так давно взялась за доработку архитектуры процессоров с целью поддержки виртуализации. В мае 2005 года компания AMD объявила о начале внедрения поддержки виртуализации в процессоры. Официальное название, которое получила новая технология — AMD Virtualization (сокращенно AMD-V), а ее внутреннее кодовое имя — AMD Pacifica. Технология AMD-V является логическим продолжением технологии Direct Connect для процессоров AMD64, направленной на повышение производительности компьютерных систем за счет тесной прямой интеграции процессора с другими компонентами аппаратного обеспечения.'
        ]);

        /*$questions = [
            [
                'q' => '',
                't' => 'task',
                'a' => ''
            ],
            [
                'q' => '',
                'a' => [
                    '1',
                    '2',
                    '0'
                ],
                'c' => [true, false, false]
            ]
        ];
        $this->create_questions($lesson, $questions);*/
    }

    private function create_questions($lesson, $questions)
    {
        foreach ($questions as $i => $q) {
            $qc = $lesson->questions()->create([
                'text' => $q['q'],
                'type' => array_has($q, 't') ? $q['t'] : 'test',
                'answer' => array_has($q, 't') && $q['t'] === 'task' ? $q['a'] : json_encode(array_map(function ($a, $c) {
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
