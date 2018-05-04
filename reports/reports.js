


function getReports(){
    var data = getFormData("#reports form");

    $.get("reports/" + data.optionsReport + ".html",function(response){
        document.querySelector(".report-data-container").innerHTML = response;
        console.log(data);
        
        showKindergartenkid();

    })

}

function getAlergicReports(){
    var data = getFormData("#alergic-report form");
    httpGet("/Sadna/server/api.php?route=get_Alergicreport", data,function(response){
        if(response.success && response.data instanceof Array){
            createAlergicTable(response.data);
           }
        });
    }

    getExceptionReports.error=function(msg){
        document.querySelector(".unsuccess-message").textContent = msg;
    }
 
 
function getPresenceReport(){
        var data = getFormData("#exception-report form");
    
        var selectedKid = kinderGarten[data.presenceOptions];
        data.kidFname = selectedKid.fname;
        data.kidLname = selectedKid.lastname;
    
        var startDate = new Date(data.startDate).getTime();
        if(!isNaN(startDate)){
            data.startDate = startDate;
        }
        else{
            return
        }
        var endDate = new Date(data.endDate).getTime();
        if(!isNaN(endDate)){
            data.endDate = endDate;
        }
        else{
            return;
        }
        
        httpGet("/Sadna/server/api.php?route=get_Presencereport", data,function(response){
            if(response.success && response.data instanceof Array){
                if(response.data.length){
                    response.data.forEach(function(item){
                        item.date = timestampToDate(item.date);
                    })
                    createExceptionTable(response.data);
                    getPresenceReport.error("");
                }
                else{
                    getPresenceReport.error("No attendance was recorded on selected date range");
                }
            }
            
        });
    }
    

function getExceptionReports(data){
    var selectedKid = kinderGarten[data.exceptionOptions];
    data.kidFname = selectedKid.fname;
    data.kidLname = selectedKid.lastname;

    var startDate = new Date(data.startDate).getTime();
    if(!isNaN(startDate)){
        data.startDate = startDate;
    }
    else{
        return
    }
    var endDate = new Date(data.endDate).getTime();
    if(!isNaN(endDate)){
        data.endDate = endDate;
    }
    else{
        return;
    }
    
    httpGet("/Sadna/server/api.php?route=get_Exceptionsreport", data,function(response){
        if(response.success && response.data instanceof Array){
            if(response.data.length){
                response.data.forEach(function(item){
                    item.date = timestampToDate(item.date);
                })
                createExceptionTable(response.data);
                getExceptionReports.error("");
            }
            else{
                getExceptionReports.error("No comments for selected date");
            }
        }
        
    });
}

function genrateKidReport(){
    var data = getFormData("#exception-report form");
    if(data.exceptionOptions == 0){
        getExceptionGraph(data);
        document.getElementById('kids-observation-table').innerHTML = "";
    }
    else{
        document.getElementById('chart_div').innerHTML = "";
        getExceptionReports(data);
    }
}

function getExceptionGraph(data){   
    var selectedKid = kinderGarten[data.exceptionOptions];
    data.kidFname = selectedKid.fname;
    data.kidLname = selectedKid.lastname;

    var startDate = new Date(data.startDate).getTime();
    if(!isNaN(startDate)){
        data.startDate = startDate;
    }
    else{
        return
    }
    var endDate = new Date(data.endDate).getTime();
    if(!isNaN(endDate)){
        data.endDate = endDate;
    }
    else{
        return;
    }
    
    httpGet("/Sadna/server/api.php?route=get_Exceptionsgraph", data,function(response){
        if(response.success && response.data instanceof Array){
            if(response.data.length){
                response.data.forEach(function(item){
                    item.date = timestampToDate(item.date);
                })
                    var namesData = {};
                    response.data.forEach(function(row){
                        var key = row.first_name + " " + row.last_name;
                        namesData[key] = namesData[key] || [];
                        namesData[key].push(row);
                    })
                    var chartData = Object.keys(namesData).map(function(name){
                        return [name,namesData[name].length];
                    })
                    console.log(chartData)
                    drawChart(chartData);
                
                getExceptionReports.error("");
            }
            else{
                getExceptionReports.error("No comments for selected date");
            }
        }
        
    });
}

var kinderGarten;


function showKindergartenkid(){
    httpGet("/Sadna/server/api.php?route=getKindergartenkid",{}, function(response){
        if(response.success){
            kinderGarten = response.data;
            response.data.unshift({fname:"All",lastname:""});
            var flatData = response.data.map(function(item){
                return item.fname + " " + item.lastname;
            })
            putInfoInsideSelector("#exception-report #exception" ,flatData);
        }
    });
}

function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row +'<th scope="row">'+item+'</th>';
    })
    return row + '</tr>';
}//



function createAlergicTable(data){
    var tableElement = document.getElementById("kids-table");
    var table='';

    table = table + buildThs(['First Name','Last Name','Parent Name','Phone Number']);

    data.forEach(function(item) {
        table = table + '<tr class="table-info"><td>'+item.first_name+'</td><td>' +item.last_name+'</td><td>'+item.parent_name +'</td><td>' + item.phone_number +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}

function createExceptionTable(data){
    var tableElement = document.getElementById("kids-observation-table");
    var table='';

    table = table + buildThs(['First Name','Last Name','Notes','Date']);

    data.forEach(function(item) {
        table = table + '<tr class="table-info"><td>' +item.first_name +'</td><td>'+item.last_name +'</td><td>' +item.note +'</td><td>' + item.date + '</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}