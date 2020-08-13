from rest_framework import serializers

from .models import (
    APIUser,
    BAccount,
    BAccountMovimant,
    BWorkOfPiety,
    Travel
)

class APIUserSerializer(serializers.ModelSerializer):

    class Meta:
            model = APIUser
            fields = (
                'name',
                'doc_id',
                'row',
                'email',
                'user_pass'
            )


class BAccountSerializer(serializers.ModelSerializer):
    
    class Meta:
        model = APIUser
        fields = (
            'title',
            'account',
            'description',
            'user_id',
            'related_name'
        )


class BAccountMovimantSerializer(serializers.ModelSerializer):

    class Meta:
        model = BAccountMovimant
        fields = (
            'user_id',
            'account_id',
            'historic',
            'deb',
            'cred'
        )


class BWorkOfPietySerializer(serializers.ModelSerializer):

    class Meta:
        model = BWorkOfPiety
        fields = (
            'user_id',
            'account_id',
            'historic',
            'deb',
            'cred',
            'value_total'
        )


class TravelSerializer(serializers.ModelSerializer):

    class Meta:
        model = Travel
        fields = (
            'user_id',
            'title',
            'collection',
            'delivered',
            'complementos',
            'deposits',
            'looting',
            'returned',
            'expenses'
        )