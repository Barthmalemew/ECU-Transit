import React, {useState, useEffect} from 'react'
import {listEmployees} from '../services/EmployeeService'

const ListEmployeeComponent = () => {
   
    const [employees, setEmployees] = useState([])

    useEffect(() => {
        listEmployees().then((response) => {
            setEmployees(response.data);
        }).catch(error => {
            console.error(error);
        })
    
    }, [])

    return(


        <body>
            <pre>
            <div id="aciiDuck">
                &#32;&#32;__<br></br>
            &lt;(o )___,<br></br>
        &#32;( &#32;._&gt;/<br></br>
        &#32;&#32;`---'<br></br>
         
        </div>
        </pre>
        <div>
            <h2>Employee List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                </thead>
        
                <tbody>
                    {
                        employees.map(employee =>
                            <tr key={employee.id}>
                                <td>{employee.id}</td>
                                <td>{employee.name}</td>
                                <td>{employee.monday}</td>
                                <td>{employee.tuesday}</td>
                                <td>{employee.wednesday}</td>
                                <td>{employee.thursday}</td>
                                <td>{employee.friday}</td>

                            </tr>)
                    }
                </tbody>
            </table>

           
        </div>
        </body>

        
    
    )
}

export default ListEmployeeComponent
