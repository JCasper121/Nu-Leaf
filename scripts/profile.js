/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/11/2020
Modified by:                               John Casper
Modification log
        addToTaskList function             9/11/20
        deleteTask and clearTaskList functions 9/11/20
        


*/
var tasks = [];

var displayTaskList = function() {
    var list = "";
    var name = localStorage.getItem("name") || "";
    if(name != "") {
        $("h1_name").firstChild.nodeValue = name + "'s Profile";
        $("h2_name").firstChild.nodeValue = name + "'s Goals";
    }
    // if there are no tasks in tasks array, check storage
    if (tasks.length === 0) {
        // get tasks from storage or empty string if nothing in storage
        var storage = localStorage.getItem("tasks") || "";

        // if not empty, convert to array and store in global tasks variable
        if (storage.length > 0) { tasks = storage.split("|"); }
    }
    
    

    if(tasks.length > 0) {
        list = tasks.join("\n");
    }

    // display tasks string and set focus on task text box
    $("task_list").value = list;
    $("task").focus();
}

var addToTaskList = function() {   
    var task = $("task").value;
    if (task === "") {
        $("task_error").firstChild.nodeValue = "Please enter a goal";
    } else {  
        $("task_error").firstChild.nodeValue = " ";
        // add task to array and local storage
        tasks.push(task);
        localStorage.tasks = tasks.join("|");

        // clear task text box and re-display tasks
        $("task").value = "";
        displayTaskList();

        for(var i = 0; i < tasks.length; i++) {
            console.log(tasks[i]);
        }
    }
}

var clearTaskList = function() {
    tasks.length = 0;
    localStorage.tasks = "";
    $("task_list").value = "";
    $("task").focus();
}

var deleteTask = function() {
    var newArray = [];
    var newArrayString;
    if(tasks.length === 0) { //If tasks is empty, check local storage for it
        var taskString = localStorage.tasks;
        tasks = taskString.split("|");
    }

    var index = prompt("Which task do you want to delete?");

    if(isNaN(index) || index < 0 || index > tasks.length-1) {

        console.log("Invalid entry");

    } else {

        for(var i = 0; i < tasks.length; i++) {
            if(i === index) {
            } else {
                newArray.push(tasks[i]);
            }
        }
        tasks = newArray;
        newArrayString = newArray.join("|");
        localStorage.tasks = newArrayString;
        displayTaskList();
        displayTaskList();
    }
}

var setName = function() {
    var name = prompt("Enter a name");
    localStorage.setItem("name", name);
    displayTaskList();
}

window.onload = function() {
    $("drkmd").onclick = darkMode;
    $("add_task").onclick = addToTaskList;
    $("clear_tasks").onclick = clearTaskList;   
    $("delete_task").onclick = deleteTask;
    // $("toggle_sort").onclick = toggleSort;
    $("set_name").onclick = setName;
    // $("filter_tasks").onclick = filterTasks;
    displayTaskList();
    checkDarkMode();
    navSpacer();

}