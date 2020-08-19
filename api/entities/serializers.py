from rest_framework import serializers

from rest_framework.response import Response

from .models import Entities
from bank_account.models import  BankAccount


class EntitySerializer(serializers.ModelSerializer ):
    
    # HyperLinked Related Field entity by user 
    # bka_entity_id this is id from bank-account relation  in db
    bka_entity_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='bankaccount-detail')

    class Meta:
        model = Entities
        fields = (
            'name',
            'type_entity',
            'description',
            'user_id',
            'document_id',
            'bka_entity_id',
            'criation',
            'actualization',
            'active'
        )