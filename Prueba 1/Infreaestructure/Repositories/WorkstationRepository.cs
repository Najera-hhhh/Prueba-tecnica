using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Prueba_1.Infraestructure.data;
using Prueba_1.Models;

namespace Prueba_1.Infreaestructure.Repositories
{
    public class WorkstationRepository
    {
        private readonly dbContext _context;
        public WorkstationRepository()
        {
            this._context = new dbContext();
        }

        public ICollection<Workstation> getAll(){
            return this._context.Workstations.ToList();
        }
    }
}