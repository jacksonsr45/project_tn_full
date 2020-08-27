from rest_framework import viewsets

from rest_framework.decorators import action
from rest_framework.response import Response

from .serializers import EntitySerializer
from .models import Entities
from accounts.models import User
from accounts.serializers import UserSerializer
from bank_account.models import BankAccount
from bank_account.serializers import BankAccountSerializer
from piety_works.models import PietWork
from piety_works.serializers import PietWorkSerializer
from travel.models  import Travel
from travel.serializers import TravelSerializer
from accounts.models import User
from accounts.serializers import UserSerializer

class EntityViewSet(viewsets.ModelViewSet):
    
    queryset = Entities.objects.all()
    serializer_class = EntitySerializer

    def get_queryset(self):
        if self.kwargs.get('entity_pk'):
            return self.queryset.filter(entity_id=self.kwargs.get('entity_pk'))
        return self.queryset.all()


    @action(detail=True, methods=['GET'])
    def contasbancarias(self, request, pk=None):
        bankaccount = BankAccount.objects.filter(entity_id=pk)
        page = self.paginate_queryset(bankaccount)

        if page is not None:
            serializer = BankAccountSerializer(page, many=True)
            return self.get_paginated_response(serializer.data)

        
        serializer = BankAccountSerializer(bankaccount, many=True)
        return Response(serializer.data)


    @action(detail=True, methods=['GET'])
    def piedade(self, request, pk=None):
        pietwork = PietWork.objects.filter(entity_piet_work_id=pk)
        page = self.paginate_queryset(pietwork)

        if page is not None:
            serializer = PietWorkSerializer(page, many=True)
            return self.get_paginated_response(serializer.data)


        serializer = PietWorkSerializer(pietwork, many=True)
        return Response(serializer.data)


    @action(detail=True, methods=['GET'])
    def viagens(self, request, pk=None):
        travel = Travel.objects.filter(entity_id=pk)
        page = self.paginate_queryset(travel)

        if page is not None:
            serializer = TravelSerializer(page, many=True)

            return self.get_paginated_response(serializer.data)

        
        serializer = TravelSerializer(travel, many=True)
        return Response(serializer.data)
        