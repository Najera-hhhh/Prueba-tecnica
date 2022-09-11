// See https://aka.ms/new-console-template for more information


using System;
using Prueba_1.Models;
using Microsoft.EntityFrameworkCore;
using System.Linq;
using Prueba_1.Infreaestructure.Repositories;

namespace Prueba_1
{

    class Program
    {
        static void Main()
        {

            EmployeeRepository empleyoee = new EmployeeRepository();
            WorkstationRepository workstationRepository = new WorkstationRepository();


            ICollection<Employee> empledasEmpresaB = empleyoee.getByCondition(empleado => empleado.EnterprisesId == 2);
            ICollection<Employee> query2 = empleyoee.getByCondition(empleado => empleado.Seniority >= 2);
            ICollection<Workstation> query3 = workstationRepository.getAll();

            System.Console.WriteLine("Todos los empleados de la empresa B ");
            foreach (var empleado in empledasEmpresaB)
            {
                System.Console.WriteLine($"{empleado.Name}\t|\t{empleado.Enterprises.Name}");
            }

            System.Console.WriteLine("\n\n\nTodos los empleados que tengan antigüedad mayor o igual a 2 años y a que empresa pertenecen.");
            foreach (var empleado in query2)
            {
                System.Console.WriteLine($"{empleado.Name}\t|\t{empleado.Enterprises.Name}");
            }

            System.Console.WriteLine("\n\n\nTodos los departamentos de todas las empresas pero que no se repitan.");
            foreach (var Workstation in query3)
            {
                System.Console.WriteLine($"{Workstation.Name}");
            }
        }
    }

}
