from django.contrib import admin

from .models import BankAccount, BankAccountMovimant

admin.site.register(BankAccount)
admin.site.register(BankAccountMovimant)