/* globals Chart:false, feather:false */

(function () {
    'use strict'
  
    feather.replace({ 'aria-hidden': 'true' })
  
    // Graphs
    var chart_kas = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(chart_kas, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
        ],
        datasets: [{
          data: [
            15339,
            21345,
            18483,
            24003,
            23489,
            24092,
            12034
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    })
  
  
    // Graphs Pendapatan
    var chart_pendapatan = document.getElementById('myChart1')
    // const data_chart_pendapatan = document.getElementById('data_myChart1')
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(chart_pendapatan, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
        ],
        datasets: [{
          data: [
            document.getElementById('data_myChart1')
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    })
  
    // Graphs Pengeluaran
    var chart_pengeluaran = document.getElementById('myChart2')
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(chart_pengeluaran, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
        ],
        datasets: [{
          data: [
            15339,
            21345,
            18483,
            24003,
            23489,
            24092,
            12034
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    })
  })()
  
  
  function saveMenuState(){
    var state = $('.submenu .submenu-open').attr('class');
    localStorage.setItem('menu-state', state);
  }
  
  function loadMenuState() {
    var state = localStorage.getItem('menu-state');
    if (state != null) $('#' + state).addClass('.submenu-open');
  }
  
  function resetMenuState() {
    localStorage.removeItem('menu-state');
  }
  
  
  function cetak(){
    const element = document.getElementById("coba");
    element.print();
  }
  
  $('#print').on('click', function() {
  
    let CSRF_TOKEN = $('meta[name="csrf-token"').attr('content');
  
    $.ajaxSetup({
      url: '/print',
      type: 'POST',
      data: {
        _token: CSRF_TOKEN,
      },
      beforeSend: function() {
        console.log('printing ...');
      },
      complete: function() {
        console.log('printed!');
      }
    });
  
    $.ajax({
      success: function(viewContent) {
        $.print(viewContent); // This is where the script calls the printer to print the viwe's content.
      }
    });
  });
  