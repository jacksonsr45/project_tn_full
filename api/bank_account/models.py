from django.db import models

from base_models.models import  Base
from accounts.models import User
from entities.models import Entities

class BankAccount(Base):
    title = models.CharField(max_length=255)
    account = models.CharField(max_length=255)
    description = models.CharField(max_length=255)
    user_id = models.ForeignKey(User, related_name='bankaccount_id', on_delete=models.CASCADE)
    entity_id = models.ForeignKey(Entities, related_name='bka_entity_id', on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'BankAccount'
        verbose_name_plural = 'BankAccounts'
        ordering = ['id']


    def __str__(self):
        return self.title