var m1, m2, err;

function count(arr, el) {
    let k = 0;
    for(let i=0; i<arr.length; i++)
        if( arr[i] == el)
            k++;
    return k;
}

//проверка ввода
function check(str){
    let arr = false;
    if(str.length>0){
        arr = str.split(" ");
        //Убрать повторяющиеся элементы
        for(let i=0; i< arr.length; i++){
            if (count(arr, arr[i]) > 1){
                arr.splice(i, 1);
                i--;
            }
        }
        //Проверка на ввод
        for(let i=0; i< arr.length; i++) {
            //первый символ
            if (arr[i][0] < 1 || arr[i][0] > 9) {
                err = "Ошибка при вводе массива!\n" + str + " В элементе " + arr[i];
                err += "\nДолжна быть введена цифра!";
                err += "\nИсправьте 1 элемент (" + arr[i][0] + ")";
                arr = false;
                break;
            }
            //второй символ
            if (arr[i][1] % 2 != 0) {
                err = "Ошибка при вводе массива!\n" + str + " В элементе " + arr[i];
                err += "\nДолжна быть введена чётная цифра!";
                err += "\nИсправьте 2 элемент (" + arr[i][1] + ")";
                arr = false;
                break;
            }
            //третий символ
            if (arr[i][2] % 2 == 0) {
                err = "Ошибка при вводе массива!\n" + str + " В элементе " + arr[i];
                err += "\nДолжна быть введена нечётная цифра!";
                err += "\nИсправьте 3 элемент (" + arr[i][2] + ")";
                arr = false;
                break;
            }
            //четвёртый символ
            if (arr[i][3] < "a" || arr[i][3] > "z") {
                err = "Ошибка при вводе массива!\n" + str + " В элементе " + arr[i];
                err += "\nДолжна быть введена буква!";
                err += "\nИсправьте 4 элемент (" + arr[i][3] + ")";
                arr = false;
                break;
            }
        }
    }
    else{
        err = "Массив не должен быть пустым!\nЗаполните массив!";
    }
    return arr;
}

//Объединение
function unification(m1, m2){
    let result = "";
    for(let i=0; i<m1.length; i++){
        result += m1[i] +" ";
    }
    for(let i=0; i<m2.length; i++){
        if(m1.indexOf(m2[i]) == -1){
            result += m2[i] + " ";
        }
    }
    return result;
}

//Пересечение
function intersection(m1, m2){
    let result = "";
    for(let i=0; i<m2.length; i++){
        if(m1.indexOf(m2[i]) != -1){
            result += m2[i] + " ";
        }
    }
    return result;
}

//дополнение массива
function addition(m1,m2){
    let result= "";
    for(let i=0; i<m1.length; i++){
        if(m2.indexOf(m1[i]) == -1){
            result += m1[i] + " ";
        }
    }
    return result;
}


//симметрическая разность
function SymmetricDifference(m1,m2){
    let result= "";
    result = addition(m1,m2) +" " + addition(m2,m1);
    return result;
}
//Основая функция
function res() {
    let resfull = "";
    var errm1 = document.getElementById('m1');
    var errm2 = document.getElementById('m2');
    if ((m1 = check(errm1.value)) == false){
        alert(err);
    }
    if ((m2 = check(errm2.value)) == false){
        alert(err);
    }
    else{
        resfull = "Объединение: " + unification(m1, m2) + "\n";
        resfull += "Пересечение: " + intersection(m1, m2) + "\n";
        resfull += "Дополнение 1 массива: " + addition(m1, m2) +"\n";
        resfull += "Дополнение 2 массива: " + addition(m2, m1) +"\n";
        resfull += "Симметрическая разность: " + SymmetricDifference(m1, m2);
        document.getElementById("outResult").innerText = "Результат выполнения операций:\n" + resfull;
    }
}