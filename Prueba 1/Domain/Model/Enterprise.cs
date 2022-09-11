using System;
using System.Collections.Generic;

namespace Prueba_1.Models
{
    public partial class Enterprise
    {
        public Enterprise()
        {
            Employees = new HashSet<Employee>();
        }

        public ulong Id { get; set; }
        public string Name { get; set; } = null!;

        public virtual ICollection<Employee> Employees { get; set; }
    }
}
