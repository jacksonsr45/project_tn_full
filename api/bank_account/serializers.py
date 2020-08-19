from rest_framework import serializers

from rest_framework.response import Response

from .models import BankAccount

class BankAccountSerializer(serializers.ModelSerializer ):

    class Meta:
        model = BankAccount
        fields = (
            'title',
            'account',
            'description',
            'criation',
            'actualization',
            'active'
        )