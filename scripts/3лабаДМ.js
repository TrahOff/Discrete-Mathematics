var err, m1, m2, m3;
var long1, long2, long3;

//проверка ввода
function check(str) {
    let arr = [];
    var long = str.length;
    if (long > 0) {
        arr = str.split(" ");
        var quantity = arr.length;
        //Проверка на ввод
        for (let i = 0; i < quantity; i++) {
            //проверка, что введены числа
            if (arr[i] < '0' || arr[i] > '9') {
                err = "Ошибка при вводе массива!\n" + " В элементе " + arr[i];
                err += "\nВведите число в диапозоне от 0 до 9!";
                err += "\nИсправьте" + i + "элемент (" + arr[i] + ")";
                arr = false;
                break;
            }
        }
    } else {
        err = "Массив не должен быть пустым!\nВведите пары чисел!";
    }
    return arr;
}


//проверка ввода отношения
function checkfun(str) {
    let arr = false;
    var long = str.length;
    if (long > 0) {
        arr = str.split("; ");
        var quantity = arr.length;
        //Проверка на ввод
        for (let i = 0; i < quantity; i++) {
            arr[i] = arr[i].split(' ');
            //проверка, что введены числа
            for (let j = 0; j < 2; j++) {
                if (arr[i][j] < '0' || arr[i][j] > '9') {
                    err = "Ошибка при вводе массива!\n" + " В элементе " + arr[i];
                    err += "\nВведите число в диапозоне от 0 до 9!";
                    err += "\nИсправьте" + i + "элемент (" + arr[i] + ")";
                    arr = false;
                    break;
                }
            }
        }
    } else {
        err = "Массив не должен быть пустым!\nВведите пары чисел!";
    }
    return arr;
}

//сравнение длин
function longcheck(m1, m2, m3) {
    long1 = m1.length;
    long2 = m2.length;
    long3 = m3.length;
    arr = false;
    if (long1 == long2) {
        if (long1 != long3) {
            err = "сумма длин множеств не совпаадает с линой отношения!"
            arr = false;
        } else { arr = true; }
    } else {
        err = "длины множеств не совпадают!";
        arr = false;
    }
    return arr;
}

var defimat = [];

//сравнение множеств и отношения
function definition(m1, m2, m3) {
    for (let i = 0; i < long1; i++) {
        defimat[i] = [];
        for (let j = 0; j < 2; j++) {
            if (j == 0) {
                defimat[i][j] = m1[i];
            } else {
                defimat[i][j] = m2[i];
            }
        }
    }
    var defin = false;
    for (let i = 0; i < long1; i++) {
        for (let j = 0; j < 2; j++) {
            if (defimat[i][j] == m3[i][j]) {
                defin = "является";
            } else {
                defin = "не является";
                return defin;
            }
        }
    }
    return defin;
}

//Основая функция
function res() {
    let resfull = "";
    var chm1 = document.getElementById('m1');
    m1 = check(chm1.value);
    var chm2 = document.getElementById('m2');
    m2 = check(chm2.value);
    var chm3 = document.getElementById('m3');
    m3 = checkfun(chm3.value);
    if (m1 == false || m2 == false || m3 == false) {
        alert(err);
    } else {
        var lch = longcheck(m1, m2, m3);
        if (lch == false) {
            alert(err);
        } else {
            resfull += "является ли отношение функцией: " + definition(m1, m2, m3);
            document.getElementById("outResult").innerText = "Результат выполнения операций:\n" + resfull;
        }
    }
}