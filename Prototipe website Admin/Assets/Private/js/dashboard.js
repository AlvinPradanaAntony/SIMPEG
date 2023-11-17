//=======================================================//
     //Tiket Yang masuk ke bidang perbulannya (myChart)

     function downloadChartReport(reportType) {
        const chartCanvas = document.getElementById('myChart');
        html2canvas(chartCanvas).then(canvas => {
          const pdf = new jsPDF();
          const imgData = canvas.toDataURL('image/png');
          pdf.addImage(imgData, 'PNG', 10, 10, 190, 100);
          pdf.save(`chart_report_${reportType}.pdf`);
        });
      }
      
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        datasets: [
          {
            label: 'Bidang satu',
            data: [
              { x: 'Bidang satu', y: 4 },
            ],
            backgroundColor: 'rgba(109, 161, 62, 100)', // Warna Bidang 1
            borderColor: 'rgba(109, 161, 62, 100)',
            fill: false,
            borderWidth: 1,
            barPercentage: 30, // Mengatur batang data di tengah
            categoryPercentage: -0.1
          },
          {
            label: 'Bidang dua',
            data: [
              { x: 'Bidang dua', y: 5 },
            ],
            backgroundColor: 'rgba(19, 128, 255, 1)', // Warna Bidang 2
            borderColor: 'rgba(19, 128, 255, 1)',
            fill: false,
            borderWidth: 1,
            barPercentage: 30, // Mengatur batang data di tengah
            categoryPercentage: -0.1
          },
          {
            label: 'Bidang tiga',
            data: [
              { x: 'Bidang tiga', y: 8 },
            ],
            backgroundColor: 'rgba(212, 89, 0, 1)', // Warna Bidang 3
            borderColor: 'rgba(212, 89, 0, 1)',
            fill: false,
            borderWidth: 1,
            barPercentage: 30, // Mengatur batang data di tengah
            categoryPercentage: -0.1
          },
          {
            label: 'Bidang empat',
            data: [
              { x: 'Bidang empat', y: 5.1 },
            ],
            backgroundColor: 'rgba(251, 212, 65, 1)', // Warna Bidang 4
            borderColor: 'rgba(251, 212, 65, 1)',
            fill: false,
            borderWidth: 1,
            barPercentage: 30, // Mengatur batang data di tengah
            categoryPercentage: -0.1
          },
          {
            label: 'Bidang lima',
            data: [
              { x: 'Bidang lima', y: 0.3 },
            ],
            backgroundColor: 'rgba(151, 71, 255, 1)', // Warna Bidang 5
            borderColor: 'rgba(151, 71, 255, 1)',
            fill: false,
            borderWidth: 1,
            barPercentage: 30, // Mengatur batang data di tengah
            categoryPercentage: -0.1
          }
        ]
      },
      options: {
        scales: {
          x: {
            beginAtZero: true,
            grid: {
              display: false,
            }
          },
          y: {
            ticks: {
                color: 'black'
            },
            beginAtZero: true,
            grid: {
              display: false,
            },
            plugins: {
              legend: {
                display: false
              }
            },
            ticks: {
              stepSize: 1,
              max: 10, // Sesuaikan nilai maksimum sesuai kebutuhan
              min: 0
            }
          }
        },
        plugins: {
        legend: {
          display:false,
          
        },
        tooltip: {
          displayColors: false,
          backgroundColor: colorItems,
          // borderColor: 'black',
          callbacks: {
              label: function(context) {
                // context adalah objek yang berisi informasi tooltip
                return context.parsed.y + ' Tiket terbuat ';
              }
            }
        }  
      },
      
      }
    });
    
      function colorItems(tooltipItem) {
        console.log(tooltipItem.tooltip.labelColors[0].borderColor);
        const tooltipBackgroundColor = tooltipItem.tooltip.labelColors[0].
          borderColor
        return tooltipBackgroundColor
      }
    
             //=======================================================//
                  //Tiket Yang masuk ke bidang perbulannya (myChart1)
    
      const datapoint1 = [12, 19, 3, 5, 2, 3];
      const ctx1 = document.getElementById('myChart1');
    
      new Chart(ctx1, {
        type: 'doughnut',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
            label: '# of Votes',
            data: datapoint1,
            borderWidth: 1
          }]
        },
        options: {
          cutout: '73%',
          elements: {
            arc: {
              borderWidth: 0
            }
          },
          plugins: {
            legend: {
              display: false,
            },
            labels: {
              render: 'percentage',
              fontColor: 'black',
              fontSize: 14,
              position: 'outside'
            }
          }
        }
      });
    
      //=======================================================//
            //Rating Pelayanan tiket perbidang (myChart2)
    
      const ctx2 = document.getElementById('myChart2');
      new Chart(ctx2, {
        type: 'bar',
        data: {
          datasets: [ 
            {
              label: 'Bidang satu',
              data: [
                { x: 'Bidang satu', y: 4.5 },
              ],
              backgroundColor: 'rgba(109, 161, 62, 100)', // Warna Bidang 1
              borderColor: 'rgba(109, 161, 62, 100)',
              fill: false,
              borderWidth: 1,
              barPercentage: 30, // Mengatur batang data di tengah
              categoryPercentage: -0.1
            },
            {
              label: 'Bidang dua',
              data: [
                { x: 'Bidang dua', y: 2.50 },
              ],
              backgroundColor: 'rgba(19, 128, 255, 1)', // Warna Bidang 2
              borderColor: 'rgba(19, 128, 255, 1)',
              fill: false,
              borderWidth: 1,
              barPercentage: 30, // Mengatur batang data di tengah
              categoryPercentage: -0.1
            },
            {
              label: 'Bidang tiga',
              data: [
                { x: 'Bidang tiga', y: 3 },
              ],
              backgroundColor: 'rgba(212, 89, 0, 1)', // Warna Bidang 3
              borderColor: 'rgba(212, 89, 0, 1)',
              fill: false,
              borderWidth: 1,
              barPercentage: 30, // Mengatur batang data di tengah
              categoryPercentage: -0.1
            },
            {
              label: 'Bidang empat',
              data: [
                { x: 'Bidang empat', y: 5.1 },
              ],
              backgroundColor: 'rgba(251, 212, 65, 1)', // Warna Bidang 4
              borderColor: 'rgba(251, 212, 65, 1)',
              fill: false,
              borderWidth: 1,
              barPercentage: 30, // Mengatur batang data di tengah
              categoryPercentage: -0.1
            },
            {
              label: 'Bidang lima',
              data: [
                { x: 'Bidang lima', y: 3 },
              ],
              backgroundColor: 'rgba(151, 71, 255, 1)', // Warna Bidang 5
              borderColor: 'rgba(151, 71, 255, 1)',
              fill: false,
              borderWidth: 1,
              barPercentage: 30, // Mengatur batang data di tengah
              categoryPercentage: -0.1
            }
          ]
        },
        options: {
          scales: {
            x: {
              beginAtZero: true,
              grid: {
                display: false,
              }
            },
            y: {
              ticks: {
                  color: 'black'
              },
              beginAtZero: true,
              grid: {
                display: false,
              },
              plugins: {
                legend: {
                  display: false
                }
              },
              ticks: {
                stepSize: 1,
                max: 10, // Sesuaikan nilai maksimum sesuai kebutuhan
                min: 0
              }
            }
          },
          plugins: {
          legend: {
            display:false,
            
          },
          tooltip: {
            displayColors: false,
            backgroundColor: colorItems,
            // borderColor: 'black',
            callbacks: {
                label: function(context) {
                  // context adalah objek yang berisi informasi tooltip
                  return 'Star ' + context.parsed.y;
                }
              }
          }  
        },
        
        }
      });
      
        function colorItems(tooltipItem) {
          console.log(tooltipItem.tooltip.labelColors[0].borderColor);
          const tooltipBackgroundColor = tooltipItem.tooltip.labelColors[0].
            borderColor
          return tooltipBackgroundColor
        }
     
    
         //=======================================================//
            //Banyaknya pegawai yang telah membuat tiket (myChart3)
      const ctx3 = document.getElementById('myChart3');
    
      new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue'],
        datasets: [{
          label: '# of Votes',
          data: [4,3],
          borderWidth: 1,
          barPercentage: 0.5,
          categoryPercentage: 1.0,
          backgroundColor: ['rgba(93, 167, 184)', 'rgba(226, 28, 28)'], // Warna latar belakang berbeda untuk setiap data
          borderColor: ['rgba(93, 167, 184)', 'rgba(226, 28, 28)'], // Warna tepi berbeda untuk setiap data
          fill: false,
        }]
      },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              display: false,
              grid: {
                display: false,
              }
            },
            y: {
              beginAtZero: true,
              grid: {
                display: false,
                drawTicks: true,
              },
              plugins: {
                legend: {
                  display: false
                },
                
              },
              ticks: {
                display: false,
                stepSize: 1,
                max: 40, // Sesuaikan nilai maksimum sesuai kebutuhan
                min: 0
              }
            }
          },
          plugins: {
            legend: {
              display: false,
            },
          },
        },
        // plugins: [ChartDataLabels]
        
      });

      