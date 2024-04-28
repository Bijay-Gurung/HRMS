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

function editTask(id) {
    const modals = document.getElementById('edit');
    const editedTaskInput = document.getElementById('edited_task');
    document.getElementById('edit_task_id').value = id;
    modals.style.display = 'block';
}
editTask();

function closeEditModal() {
    const modals = document.getElementById('edit');
    modals.style.display = 'none';
}
closeEditModal();