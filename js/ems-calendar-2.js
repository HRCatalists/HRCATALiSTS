
                    
                    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    let start = new Date(2024, 0, 1);
                    let end = new Date(2024, 1, 1);
                  
                    function updateCalendar(type) {
                      const date = type === 'start' ? start : end;
                      const calendarId = type === 'start' ? 'start' : 'end';
                      const monthYearElem = document.getElementById(`${calendarId}-month-year`);
                      const daysElem = document.getElementById(`${calendarId}-days`);
                  
                      monthYearElem.textContent = `${monthNames[date.getMonth()]} ${date.getFullYear()}`;
                      daysElem.innerHTML = '';
                  
                      // Calculate days
                      const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
                      const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
                  
                      // Render empty days at the start
                      for (let i = 0; i < firstDay; i++) {
                        const emptyDiv = document.createElement('div');
                        emptyDiv.classList.add('day', 'disabled');
                        daysElem.appendChild(emptyDiv);
                      }
                  
                      // Render each day
                      for (let day = 1; day <= daysInMonth; day++) {
                        const dayDiv = document.createElement('div');
                        dayDiv.classList.add('day');
                        dayDiv.textContent = day;
                  
                        if (type === 'start' && day === start.getDate()) {
                          dayDiv.classList.add('selected');
                        } else if (type === 'end' && day === end.getDate()) {
                          dayDiv.classList.add('selected');
                        }
                  
                        dayDiv.addEventListener('click', () => {
                          if (type === 'start') {
                            start.setDate(day);
                          } else {
                            end.setDate(day);
                          }
                          updateCalendar(type);
                        });
                  
                        daysElem.appendChild(dayDiv);
                      }
                    }
                  
                    function prevMonth(type) {
                      if (type === 'start') {
                        start.setMonth(start.getMonth() - 1);
                      } else {
                        end.setMonth(end.getMonth() - 1);
                      }
                      updateCalendar(type);
                    }
                  
                    function nextMonth(type) {
                      if (type === 'start') {
                        start.setMonth(start.getMonth() + 1);
                      } else {
                        end.setMonth(end.getMonth() + 1);
                      }
                      updateCalendar(type);
                    }
                  
                    // Initial render
                    updateCalendar('start');
                    updateCalendar('end');
