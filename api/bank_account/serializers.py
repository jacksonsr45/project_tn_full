from rest_framework import serializers

from rest_framework.response import Response

from .models import BankAccount, BankAccountMovimant

class BankAccountSerializer(serializers.ModelSerializer ):

    bank_account_moviment = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='bankaccountmovimant-detail')

    class Meta:
        model = BankAccount
        fields = (
            'title',
            'account',
            'description',
            'bank_account_moviment',
            'criation',
            'actualization',
            'active'
        )


class BankAccountMovimantSerializer(serializers.ModelSerializer):
    
    class Meta:
        model = BankAccountMovimant
        fields = (
            'historic',
            'deb',
            'cred'
        )