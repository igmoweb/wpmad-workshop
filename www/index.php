<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<div id="title">
	<h1>WP Madrid - Workshop: Refactoring + Pair Programming</h1>
</div>

	<div id="content">
		<p>
			En el workshop de hoy refactorizaremos un pedazo de código que un desarrollador anterior nos ha dejado como herencia.
			El objetivo es rehacer todo el código de una tienda llamada Gilded Rose. Podemos elegir entre JavaScript o PHP y algunas herramientas útiles.
		</p>

		<h2>Gilded Rose</h2>
		<p>¡Bienvenido al equipo de Gilded Rose!. Aquí tienes enlaces a documentación relativa al proyecto:</p>
		<ul>
			<li>Sobre Gilded Rose Kata <a href="https://github.com/emilybache/GildedRose-Refactoring-Kata">https://github.com/emilybache/GildedRose-Refactoring-Kata</a></li>
			<li>Requerimientos (Español): <a href="https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/master/GildedRoseRequirements_es.md">https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/master/GildedRoseRequirements_es.md</a></li>
			<li>Requerimientos (Inglés): <a href="https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/master/GildedRoseRequirements.txt">https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/master/GildedRoseRequirements.txt</a></li>
		</ul>

		<h2>¿Qué lenguaje utilizar?</h2>

		<h3>PHP</h3>
		<p>
			Aquí tienes <a href="php/src/index.php">la tienda</a> en PHP. Al final del ejercicio, la salida por pantalla debe ser igual.
		</p>
		<p>
			Si optas por PHP, puedes empezar por <code>./www/php/src/gilded_rose.php</code>. <br>
		</p>

		<h3>JavaScript</h3>
		Aquí tienes <a href="php/src/index.php">la tienda</a> en JS. Al final del ejercicio, la salida por pantalla debe ser igual.
		<p>
			Si optas por JavaScript, simplemente abre <code>./www/js/src/gilded_rose.js</code> en tu navegador y editor
		</p>

		<h2>Unit Testing</h2>

		<p>En Gilded Rose siempre hemos sido partidarios de hacer tests unitarios pero no tenemos ni idea de lo que es eso. Según el último desarrollador, aquí tienes algunas indicaciones</p>
		<p><strong>Nota:</strong> No tienes porqué optar por hacer tests unitarios. Puedes simplemente modificar los ficheros de ejemplos para realizar pruebas.</p>

		<h3>PHPUnit (PHP)</h3>

		<ul>
			<li>El framework de unit testing más conocido en PHP</li>
			<li><code>./bin/phpunit.sh</code> para ejecutar los tests unitarios</li>
			<li>Puedes añadir tests unitarios al fichero <code>./www/php/test/phpunit/gilded_rose_test.php</code></li>
			<li>Cada método de la clase ejecutará un test distinto</li>
		</ul>

		<h3>Simple Tests (PHP)</h3>

		<ul>
			<li>Un ligero y viejo sistema de tests unitarios para el navegador. Nada de configuraciones pesadas.</li>
			<li>Accede a la página <a href="php/test/simpletest/index.php">php/test/simpletest</a> para ejecutarlos</li>
			<li>Puedes añadir tests unitarios al fichero <code>./www/php/test/simpletest/index.php</code></li>
		</ul>

		<h3>Jasmine (JS)</h3>

		<ul>
			<li>En Gilded Rose nos gusta lo añejo, por eso tenemos montado un Jasmine 1.x, más viejo que nuestros quesos.</li>
			<li>Accede a la página <a href="js/SpecRunner.html">js/SpecRunner.html</a> para ejecutarlos</li>
			<li>Puedes añadir tests unitarios al fichero <code>./www/js/spec/gilded_rose_spec.js</code></li>
		</ul>

	</div>

	<style>
		body {
			font-family: Verdana, sans-serif;
			color:#333;
			font-size:16px;
			line-height:26px;
			background: #fdfaf5;
		}

		#title	{
			width:80%;
			margin: 0 auto;
		}

		h1,h2,h3,h4 {
			font-family: 'Georgia', sans-serif;
		}

		h1 {
			margin: 2.5rem 0;
			color:#135157;
		}
		h2 {
			margin: 2rem 0;
			padding-bottom:5px;
			border-bottom: 2px solid #0ac8b3;
		}
		h3,h4 {
			margin: 0.7rem 0;
		}

		#content {
			border:1px solid #d7d4cf;
			width:80%;
			margin:0 auto;
			padding:1rem;
			background:white;
			border-radius: 3px;
		}
		a {
			color:#135157;
			font-weight: 600;
		}
		a:hover {
			color: #12a1a7;
		}
		code {
			background: #b3b0ab;
			padding:3px;
			font-family: "Courier New", monospace;
			font-weight: bold;
		}
	</style>

</body>
</html>


