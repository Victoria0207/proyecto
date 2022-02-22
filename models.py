from django.db import models

# Create your models here.
class Persona(models.Model):
    id = models.AutoField(primary_key=True)
    nombre = models.CharField(max_length=60)
    apellido = models.CharField(max_length=100)
    dni=models.CharField(max_length=8)
    fecha=models.DateField("2002","7","2")
    club = models.CharField(max_length=50)
    foto = models.ImageField(
        upload_to = 'foto/%Y/%m/%d',
        blank = True,
        verbose_name = ('Foto de la persona')
    )
  
    

class Meta:
    verbose_name = ('Persona')
    verbose_name_plural = ('Persona')
    
    

def __str__(self):
    return self.nombre


    
