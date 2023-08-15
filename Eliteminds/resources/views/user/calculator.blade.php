<!DOCTYPE html>
<!-- saved from url=(0012)about:srcdoc -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>{{env('APP_NAME')}} Calculator</title>

    <style>
        body {
            background: #085078;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #85D8CE, #085078);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #85D8CE, #085078); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .calculator {
            width: 490px;
            background-color: beige;
            padding: 20px;
            border-radius: 10px;
        }


        input[type=text] {
            width: 315px;
            height: 25px;
            border-radius: 5px;
            border: 0px;
            background-color: #333333;
            color: #d9d9d9;
            padding: 0 5px 0 5px;
            margin: 0 0px 10px 84px;

        }

        .calc-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .button {
            margin: 3px;
            width: 63px;
            border: none;
            height: 25px;
            border-radius: 4px;
            color: #000000;
            cursor: pointer;
        }

        button:hover {
            background-color: hsla(180, 100%, 40%, 0.3);
            transition: .2s;
        }




        .functions-one {
            width: 210px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }


        .functions-two {
            width: 280px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .triggers {
            background-color: #ffc266;
        }



        .numbers {
            background-color: #999999;
        }

        .basic-stuff {
            background-color: #80d4ff;
        }

        .complex-stuff {
            background-color: #80ffff;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>

    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>

</head>

<body translate="no">
<div class="calculator">
    <input type="text" id="screen" maxlength="20">
    <div class="calc-buttons">



        <div class="functions-one">
            <button class="button triggers">C</button>
            <button class="button basic-stuff">(</button>
            <button class="button basic-stuff">)</button>
            <button class="button numbers">7</button>
            <button class="button numbers">8</button>
            <button class="button numbers">9</button>
            <button class="button numbers">4</button>
            <button class="button numbers">5</button>
            <button class="button numbers">6</button>
            <button class="button numbers">1</button>
            <button class="button numbers">2</button>
            <button class="button numbers">3</button>
            <button class="button basic-stuff">±</button>
            <button class="button numbers">0</button>
            <button class="button basic-stuff">.</button>
        </div>

        <div class="functions-two">
            <button class="button triggers">&lt;=</button>
            <button class="button complex-stuff">%</button>
            <button class="button complex-stuff">x !</button>
            <button class="button complex-stuff">x^</button>
            <button class="button basic-stuff">*</button>
            <button class="button basic-stuff">/</button>
            <button class="button complex-stuff">ln</button>
            <button class="button complex-stuff">e</button>
            <button class="button basic-stuff">+</button>
            <button class="button complex-stuff">x ²</button>
            <button class="button complex-stuff">log</button>
            <button class="button complex-stuff">cos</button>
            <button class="button basic-stuff">-</button>
            <button class="button complex-stuff">√</button>
            <button class="button complex-stuff">sin</button>
            <button class="button complex-stuff">tan</button>
            <button class="button triggers">=</button>
            <button class="button complex-stuff">π</button>
            <button class="button complex-stuff">∘</button>
            <button class="button complex-stuff">rad</button>
        </div>

    </div>
</div>


<script id="rendered-js">
    var display = document.getElementById("screen");
    var buttons = document.getElementsByClassName("button");

    Array.prototype.forEach.call(buttons, function (button) {
        button.addEventListener("click", function () {
            if (button.textContent != "=" &&
                button.textContent != "C" &&
                button.textContent != "x" &&
                button.textContent != "÷" &&
                button.textContent != "√" &&
                button.textContent != "x ²" &&
                button.textContent != "%" &&
                button.textContent != "<=" &&
                button.textContent != "±" &&
                button.textContent != "sin" &&
                button.textContent != "cos" &&
                button.textContent != "tan" &&
                button.textContent != "log" &&
                button.textContent != "ln" &&
                button.textContent != "x^" &&
                button.textContent != "x !" &&
                button.textContent != "π" &&
                button.textContent != "e" &&
                button.textContent != "rad" &&
                button.textContent != "∘") {
                display.value += button.textContent;
            } else if (button.textContent === "=") {
                equals();
            } else if (button.textContent === "C") {
                clear();
            } else if (button.textContent === "x") {
                multiply();
            } else if (button.textContent === "÷") {
                divide();
            } else if (button.textContent === "±") {
                plusMinus();
            } else if (button.textContent === "<=") {
                backspace();
            } else if (button.textContent === "%") {
                percent();
            } else if (button.textContent === "π") {
                pi();
            } else if (button.textContent === "x ²") {
                square();
            } else if (button.textContent === "√") {
                squareRoot();
            } else if (button.textContent === "sin") {
                sin();
            } else if (button.textContent === "cos") {
                cos();
            } else if (button.textContent === "tan") {
                tan();
            } else if (button.textContent === "log") {
                log();
            } else if (button.textContent === "ln") {
                ln();
            } else if (button.textContent === "x^") {
                exponent();
            } else if (button.textContent === "x !") {
                factorial();
            } else if (button.textContent === "e") {
                exp();
            } else if (button.textContent === "rad") {
                radians();
            } else if (button.textContent === "∘") {
                degrees();
            }
        });
    });


    function syntaxError() {
        if (eval(display.value) == SyntaxError || eval(display.value) == ReferenceError || eval(display.value) == TypeError) {
            display.value == "Syntax Error";
        }
    }


    function equals() {
        if (display.value.indexOf("^") > -1) {
            var base = display.value.slice(0, display.value.indexOf("^"));
            var exponent = display.value.slice(display.value.indexOf("^") + 1);
            display.value = eval("Math.pow(" + base + "," + exponent + ")");
        } else {
            display.value = eval(display.value);
            checkLength();
            syntaxError();
        }
    }

    function clear() {
        display.value = "";
    }

    function backspace() {
        display.value = display.value.substring(0, display.value.length - 1);
    }

    function multiply() {
        display.value += "*";
    }

    function divide() {
        display.value += "/";
    }

    function plusMinus() {
        if (display.value.charAt(0) === "-") {
            display.value = display.value.slice(1);
        } else {
            display.value = "-" + display.value;
        }
    }

    function factorial() {
        var number = 1;
        if (display.value === 0) {
            display.value = "1";
        } else if (display.value < 0) {
            display.value = "undefined";
        } else {
            var number = 1;
            for (var i = display.value; i > 0; i--) {if (window.CP.shouldStopExecution(0)) break;
                number *= i;
            }window.CP.exitedLoop(0);
            display.value = number;
        }
    }

    function pi() {
        display.value = display.value * Math.PI;
    }

    function square() {
        display.value = eval(display.value * display.value);
    }

    function squareRoot() {
        display.value = Math.sqrt(display.value);
    }

    function percent() {
        display.value = display.value / 100;
    }

    function sin() {
        display.value = Math.sin(display.value);
    }

    function cos() {
        display.value = Math.cos(display.value);
    }

    function tan() {
        display.value = Math.tan(display.value);
    }

    function log() {
        display.value = Math.log10(display.value);
    }

    function ln() {
        display.value = Math.log(display.value);
    }

    function exponent() {
        display.value += "^";
    }

    function exp() {
        display.value = Math.exp(display.value);
    }

    function radians() {
        display.value = display.value * (Math.PI / 180);
    }

    function degrees() {
        display.value = display.value * (180 / Math.PI);
    }
    //# sourceURL=pen.js
</script>
</body>
</html>
