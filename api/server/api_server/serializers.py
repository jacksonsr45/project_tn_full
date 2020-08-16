from rest_framework import serializers
from django.db.models import Sum

from rest_framework.authtoken.views import ObtainAuthToken
from rest_framework.authtoken.models import Token
from rest_framework.response import Response

from .models import (
    User,
    BAccount,
    BAccountMovimant,
    BWorkOfPiety,
    Travel
)


class CustomAuthToken(ObtainAuthToken):
    #
    # Modificar aqui! 
    # #
    def post(self, request, *args, **kwargs):
        serializer = self.serializer_class(data=request.data,
                                           context={'request': request})
        serializer.is_valid(raise_exception=True)
        user = serializer.validated_data['user']
        token, created = Token.objects.get_or_create(user=user)
        return Response({
            'token': token.key,
            'user_id': user.pk,
            'email': user.email
        })


class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = (
            'id',
            'email',
            'active',
            'staff',
            'admin'
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
    
    media_value_total = serializers.SerializerMethodField()

    class Meta:
        model = BWorkOfPiety
        fields = (
            'id',
            'user_id',
            'account_id',
            'historic',
            'deb',
            'cred',
            'media_value_total',
            'criation',
            'actualization',
            'active'
        )

    def get_media_value_total(self, obj):
        media_plus = BWorkOfPiety.objects.aggregate(plus=Sum('cred'))['plus']
        
        media_less = BWorkOfPiety.objects.aggregate(less=Sum('deb'))['less']

        media = media_plus - media_less
        
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