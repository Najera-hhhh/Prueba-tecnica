using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;
using Prueba_1.Models;

namespace Prueba_1.Infraestructure.data
{
    public partial class dbContext : DbContext
    {
        public dbContext()
        {
        }

        public dbContext(DbContextOptions<dbContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Employee> Employees { get; set; } = null!;
        public virtual DbSet<Enterprise> Enterprises { get; set; } = null!;
        public virtual DbSet<Workstation> Workstations { get; set; } = null!;

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {

                optionsBuilder.UseMySql("server=localhost;database=api;user=admin;pwd=admin", Microsoft.EntityFrameworkCore.ServerVersion.Parse("10.9.2-mariadb"));
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.UseCollation("utf8mb4_unicode_ci")
                .HasCharSet("utf8mb4");

            modelBuilder.Entity<Employee>(entity =>
            {
                entity.ToTable("employee");

                entity.HasIndex(e => e.WorstationId, "employee_FK");

                entity.HasIndex(e => e.EnterprisesId, "employee_FK_1");

                entity.Property(e => e.Id)
                    .HasColumnType("bigint(20) unsigned")
                    .HasColumnName("id");

                entity.Property(e => e.EnterprisesId)
                    .HasColumnType("bigint(20) unsigned")
                    .HasColumnName("enterprises_id");

                entity.Property(e => e.Name)
                    .HasMaxLength(100)
                    .HasColumnName("name");

                entity.Property(e => e.Seniority).HasColumnName("seniority");

                entity.Property(e => e.WorstationId)
                    .HasColumnType("bigint(20) unsigned")
                    .HasColumnName("worstation_id");

                entity.HasOne(d => d.Enterprises)
                    .WithMany(p => p.Employees)
                    .HasForeignKey(d => d.EnterprisesId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("employee_FK_1");

                entity.HasOne(d => d.Worstation)
                    .WithMany(p => p.Employees)
                    .HasForeignKey(d => d.WorstationId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("employee_FK");
            });

            modelBuilder.Entity<Enterprise>(entity =>
            {
                entity.ToTable("enterprises");

                entity.Property(e => e.Id)
                    .HasColumnType("bigint(20) unsigned")
                    .HasColumnName("id");

                entity.Property(e => e.Name)
                    .HasMaxLength(100)
                    .HasColumnName("name");
            });

            modelBuilder.Entity<Workstation>(entity =>
            {
                entity.ToTable("workstations");

                entity.Property(e => e.Id)
                    .HasColumnType("bigint(20) unsigned")
                    .HasColumnName("id");

                entity.Property(e => e.Name)
                    .HasMaxLength(100)
                    .HasColumnName("name");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
