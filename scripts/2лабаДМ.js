var err, matrix, couple, rows, columns, arr, couplesmatrix, arrlength, elements, newell;

//проверка ввода
function check(str) {
    let arr = false;
    var long = str.length;
    if (long > 0) {
        arr = str.split("; ");
        var quantity = arr.length;
        //Проверка на ввод
        for (let i = 0; i < quantity; i++) {
            var quantity = arr[i].length;
            if (quantity % 2 == 0) {
                err = "Ошибка ввода!\nВведены не пары чисел!\nДобавьте или уберите число!";
                arr = false;
                break;
            }
            //проверка, что введены числа
            if (arr[i][0] < '0' || arr[i][2] > '9') {
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

//счётчик элементов
function count(arr, el) {
    let k = 0;
    for (let i = 0; i < arr.length; i++) {
        if (arr[i] == el) {
            k++;
        }
    }
    return k;
}

//вывод всех чисел в одномерный массив
function deleting(arr) {
    var elemarr = [];
    let q = 0;
    for (let i = 0; i < arr.length; i++) {
        arr[i] = arr[i].split(" ");
        for (let j = 0; j < 2; j++) {
            elemarr[q] = arr[i][j];
            q++
        }
    }
    return elemarr;
}

//выделение элементов массива по одному разу и постороение матрицы из нулей и единиц
function MatrixTranslation(arr) {
    arrlength = arr.length;
    for (let i = 0; i < arrlength; i++) {
        if (count(arr, arr[i]) > 1) {
            arr.splice(i, 1);
            i--;
            arrlength--;
        }
    }

    for (let i = 0; i < arrlength; i++) {
        if (arr[i] > arr[i + 1]) {
            let tmp = arr[i]
            arr[i] = arr[i + 1];
            arr[i + 1] = tmp;
        }
    }

    couplesmatrix = [];
    let k = 0;
    var couplerows = couple.length;
    for (let i = 0; i < couplerows; i++) {
        couplesmatrix[i] = couple[i].split(" ");
    }

    let r = 0;
    let l = 0;
    var translatedmatrix = [];
    rows = arr.length + 1;
    columns = arr.length + 1;
    for (let i = 0; i < rows; i++) {
        translatedmatrix[i] = [];
        for (let j = 0; j < columns; j++) {
            translatedmatrix[0][0] = '0';
            if (i == 0 || j == 0) {
                if (i == 0 && j != 0) {
                    translatedmatrix[i][j] = arr[r];
                    r++;
                }
                if (j == 0 && i != 0) {
                    translatedmatrix[i][j] = arr[l];
                    l++;
                }
            } else {
                for (k = 0; k < couplerows; k++) {
                    if ((translatedmatrix[0][j] == couplesmatrix[k][1] && translatedmatrix[i][0] == couplesmatrix[k][0])) {
                        translatedmatrix[i][j] = '1';
                        break;
                    } else {
                        translatedmatrix[i][j] = '0';
                    }
                }
            }
        }

    }
    return translatedmatrix;
}

//рефлексивность
function reflexivity(matrix) {
    var reflex = false;
    refk = 0;
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (i == j && matrix[i][j] == '1') {
                refk++;
            }
        }
    }
    if (refk == arrlength) {
        reflex = true;
    }
    return reflex;
}

function symmetric(matrix) {
    var symmetr = false;
    let symk = 0;
    let matrixsize = (rows - 1) * (columns - 1);
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (matrix[i][j] == matrix[j][i]) {
                symk++;
            }
        }
    }
    if (symk == matrixsize) {
        symmetr = true;
    }
    return symmetr;
}

var skewk;
var matrixsize;

function skew_symmetry(matrix) {
    var skew = false;
    skewk = 0;
    let matrixsize = (rows - 2) * (columns - 1);
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (matrix[i][j] != matrix[j][i] && i != j) {
                skewk++;
            }
        }
    }
    if (skewk == matrixsize) {
        skew = true;
    }
    return skew;
}

function transitivity(matrix) {
    var transit = false;
    trak = 0;
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (i != j && matrix[i][j] == '1') {
                trak++;
            }
        }
    }
    if (trak >= rows) {
        transit = true;
    }
    return transit;
}

//Основая функция
function res() {
    let resfull = "";
    var couples = document.getElementById('couples');
    couple = check(couples.value);
    arr = check(couples.value);
    let arr1 = check(couples.value);
    if (couple == false) {
        alert(err);
    } else {
        elements = deleting(arr);
        newell = deleting(arr1);
        matrix = MatrixTranslation(elements);
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < columns; j++) {
                resfull += matrix[i][j] + ' ';
            }
            resfull += '\n';
        }
        resfull += "Рефлексивность: " + reflexivity(matrix) + "\n";
        resfull += "Симметричность: " + symmetric(matrix) + "\n";
        resfull += "Кососимметричность: " + skew_symmetry(matrix) + "\n";
        resfull += "Транзитивность: " + transitivity(matrix) + "\n";

        document.getElementById("outResult").innerText = "Результат выполнения операций:\n" + resfull;
    }
}