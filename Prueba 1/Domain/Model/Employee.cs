using System;
using System.Collections.Generic;

namespace Prueba_1.Models
{
    public partial class Employee
    {
        public ulong Id { get; set; }
        public string Name { get; set; } = null!;
        public float Seniority { get; set; }
        public ulong WorstationId { get; set; }
        public ulong EnterprisesId { get; set; }

        public virtual Enterprise Enterprises { get; set; } = null!;
        public virtual Workstation Worstation { get; set; } = null!;
    }
}
