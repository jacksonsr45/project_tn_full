from rest_framework import viewsets
from rest_framework import permissions

from django.contrib.auth.mixins import LoginRequiredMixin

from .serializers import UserSerializer
from .models import User

class UserViewSet(viewsets.ModelViewSet):
    
    queryset = User.objects.all()
    serializer_class = UserSerializer
    permission_classes = [permissions.IsAuthenticatedOrReadOnly]
