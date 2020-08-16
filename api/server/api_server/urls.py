from django.urls import path

from rest_framework.routers import SimpleRouter

from .views import (
    UserViewSet,
    BAccountViewSet,
    BAccountMovimantViewSet,
    BWorkOfPietyViewSet,
    TravelViewSet
)


router = SimpleRouter()
router.register('usuarios', UserViewSet)
router.register('dados-bancos', BAccountViewSet)
router.register('movimentos-conta', BAccountMovimantViewSet)
router.register('piedade', BWorkOfPietyViewSet)
router.register('viagens', TravelViewSet)