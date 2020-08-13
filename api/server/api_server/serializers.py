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
            extra_kwargs = {
                'user_pass': {'write_only': True}
            }
            fields = (
                'id',
                'name',
                'doc_id',
                'row',
                'email',
                'user_pass',
                'criation',
                'actualization',
                'active'
            )


class BAccountSerializer(serializers.ModelSerializer):
    
    class Meta:
        model = BAccount
        fields = (
            'id',
            'title',
            'account',
            'description',
            'user_id',
            'criation',
            'actualization',
            'active'
        )


class BAccountMovimantSerializer(serializers.ModelSerializer):

    class Meta:
        model = BAccountMovimant
        fields = (
            'id',
            'user_id',
            'account_id',
            'historic',
            'deb',
            'cred',
            'criation',
            'actualization',
            'active'
        )


class BWorkOfPietySerializer(serializers.ModelSerializer):

    value_total = serializers.PrimaryKeyRelatedField(many=True, read_only=True)
    
    media_value_total = serializers.SerializerMethodField()

    class Meta:
        model = BWorkOfPiety
        fields = (
            'user_id',
            'account_id',
            'historic',
            'deb',
            'cred',
            'value_total',
            'criation',
            'actualization',
            'active'
        )

    def get_media_value_total(self, obj):
        media_plus = obj.cred.aggregate(Avg('cred')).get('cred__avg')
        
        media_less = obj.deb.aggregate(Avg('deb')).get('deb__avg')

        media = (media_plus - media_less)
        
        if media is None:
            return 0
        return media

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
            'expenses',
            'criation',
            'actualization',
            'active'
        )