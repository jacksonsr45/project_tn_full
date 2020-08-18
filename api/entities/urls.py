from rest_framework import routers
from .views import EntityViewSet

entity_router = routers.DefaultRouter()
entity_router.register(r'entidade', EntityViewSet)