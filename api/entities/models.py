from django.db import models

from accounts.models import User

class Entities(models.Model):
    
    name = models.CharField(max_length=255)
    type_entity = models.CharField(max_length=255)
    description = models.TextField(blank=True, default='')
    user_id =  models.ForeignKey(User, related_name='entitie_id',on_delete=models.CASCADE)
    document_id = models.CharField(max_length=255, blank=True)


    class Meta:
        verbose_name = 'Entity'
        verbose_name_plural = 'Entities'
        unique_together = ['name', 'document_id']
        ordering = ['id']
    
    
    def __str__(self):
        return  self.name