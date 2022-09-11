using System;
using System.Collections.Generic;
using System.Linq;
using System.Linq.Expressions;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using Prueba_1.Infraestructure.data;
using Prueba_1.Models;

namespace Prueba_1.Infreaestructure.Repositories
{
    
    public class EmployeeRepository
    {
       private readonly dbContext _context;
       public EmployeeRepository(){
        this._context = new dbContext();
       }


        public ICollection<Employee> getByCondition( Expression<Func<Employee, bool>> condition){
            return this._context.Employees.
            Include(x => x.Enterprises)
            .Where(condition).ToArray();
        }

    }
}