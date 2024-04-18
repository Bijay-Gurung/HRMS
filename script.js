//To Do List
function completeTask(index){
    let checkerBox = document.getElementById("tick"+ index);
    let task = document.getElementById("tasklist"+ index);
    if(checkerBox.checked){
        task.style.textDecoration = 'line-through';
    }else{
        task.style.textDecoration = 'none';
    }
    // Storing checkbox state in local storage
    localStorage.setItem("checkbox"+index,checkerBox.checked);
}

