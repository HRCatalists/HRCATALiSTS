<x-admin-ems-layout>

    <x-slot:title>
        Columban College Inc. | Calendar
    </x-slot:title>
    
        <!-- Sidebar & Master List -->
        <div class="d-flex">
            <!-- Sidebar -->
            <x-partials.system.ats.ats-sidebar />

            <!-- End of Sidebar -->
        
            <!-- Employee List -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">
                    
                    <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                        <div>
                            <h2 class="db-h2">Employee List</h2>
                        </div>
    
                        <div class="d-flex">
                            <!-- Add Position Button -->
                            <div class="container text-center">
                                <a href="admin-ems-add-emp.html" class="button btn add-btn">ADD EMPLOYEE</a>
                            </div>
    
                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                            </button>
                        </div>
    
                    </div>
        
                    <!-- Employee Table -->
                    <table id="employeeTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectAll"> </th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>DEPARTMENT</th>
                                <th>POSITION</th>
                                <th>DATE OF EMPLOYMENT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Computer Studieds</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Nursing</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Architecture</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Architecture</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Delete Popup -->
        <div id="rejectPopup" class="custom-popup">
            <div class="popup-content">
                <p>Are you sure you want to delete this employee?</p>
                <button class="btn btn-danger" onclick="rejectAction()">Yes, delete the employee!</button>
                <button class="btn btn-outline-secondary" onclick="closePopup('rejectPopup')">Cancel</button>
            </div>
        </div>

</x-admin-ems-layout>