from rest_framework import serializers

from rest_framework.response import Response

from .models import Entities
from bank_account.models import  BankAccount
from piety_works.models import PietWork
from travel.models import Travel


class EntitySerializer(serializers.ModelSerializer ):
    
    # HyperLinked Related Field entity by user 
    # bka_entity_id this is id from bank-account relation  in db
    bka_entity_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='bankaccount-detail')
    # piet_work_entity_id this is id from piet work relation  in db
    piet_work_entity_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='pietwork-detail')
    # travel_id this is id from travel relation  in db
    travel_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='travel-detail')



    class Meta:
        model = Entities
        fields = (
            'name',
            'type_entity',
            'description',
            'user_id',
            'document_id',
            'bka_entity_id',
            'piet_work_entity_id',
            'travel_id',
            'criation',
            'actualization',
            'active'
        )